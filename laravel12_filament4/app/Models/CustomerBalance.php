<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerBalance extends Model
{
    protected $table = 'customer_balance';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $appends = [
        'account_name',
        'account_type',
        'usable_balance',
        'credit_utilization_percent',
        'credit_status',
    ];

    protected $casts = [
        'credit_limit' => 'decimal:6',
        'balance' => 'decimal:6',
        'maxcredit_limit' => 'decimal:6',
        'update_dt' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'account_id', 'account_id');
    }

    public function reseller(): BelongsTo
    {
        return $this->belongsTo(Reseller::class, 'account_id', 'account_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'account_id', 'account_id');
    }

    protected function accountName(): Attribute
    {
        return Attribute::get(fn (): string => (string) (
            $this->customer?->company_name
            ?? $this->reseller?->company_name
            ?? $this->users->first()?->name
            ?? $this->account_id
        ));
    }

    protected function accountType(): Attribute
    {
        return Attribute::get(function (): string {
            if ($this->customer !== null) {
                return 'CUSTOMER';
            }

            if ($this->reseller !== null) {
                return 'RESELLER';
            }

            if ($this->users->isNotEmpty()) {
                return 'USER';
            }

            return 'UNASSIGNED';
        });
    }

    protected function usableBalance(): Attribute
    {
        return Attribute::get(fn (): float => (float) $this->credit_limit - (float) $this->balance);
    }

    protected function creditUtilizationPercent(): Attribute
    {
        return Attribute::get(function (): float {
            $creditLimit = (float) $this->credit_limit;

            if ($creditLimit <= 0.0) {
                return 0.0;
            }

            return ((float) $this->balance / $creditLimit) * 100;
        });
    }

    protected function creditStatus(): Attribute
    {
        return Attribute::get(function (): string {
            if ((float) $this->balance <= 0.0) {
                return 'Available';
            }

            if ((float) $this->credit_limit > 0.0 && (float) $this->balance >= (float) $this->credit_limit) {
                return 'Credit Exceeded';
            }

            if ((float) $this->maxcredit_limit > 0.0 && (float) $this->balance >= (float) $this->maxcredit_limit) {
                return 'Max Credit Exceeded';
            }

            return 'In Use';
        });
    }
}
