<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveCall extends Model
{
    protected $table = 'livecalls';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'carrier_rate' => 'decimal:6',
        'customer_rate' => 'decimal:6',
        'reseller1_rate' => 'decimal:6',
        'reseller2_rate' => 'decimal:6',
        'reseller3_rate' => 'decimal:6',
        'start_time' => 'datetime',
        'answer_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
