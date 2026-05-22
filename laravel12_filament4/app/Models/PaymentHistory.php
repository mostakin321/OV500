<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = 'payment_history';

    protected $primaryKey = 'payment_id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'amount' => 'decimal:6',
        'paid_on' => 'datetime',
        'create_dt' => 'datetime',
    ];
}
