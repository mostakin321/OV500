<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerBalance extends Model
{
    protected $table = 'customer_balance';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

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
}
