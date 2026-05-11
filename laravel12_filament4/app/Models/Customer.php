<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $table = 'customers';

    protected $primaryKey = 'customer_id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'next_billing_date' => 'datetime',
        'created_dt' => 'datetime',
        'updated_dt' => 'datetime',
    ];

    public function balance(): HasOne
    {
        return $this->hasOne(CustomerBalance::class, 'account_id', 'account_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'account_id', 'account_id');
    }
}
