<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariff';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'tariff_currency_id' => 'integer',
        'monthly_charges' => 'decimal:6',
        'bundle1_value' => 'decimal:6',
        'bundle2_value' => 'decimal:6',
        'bundle3_value' => 'decimal:6',
        'create_dt' => 'datetime',
        'update_dt' => 'datetime',
    ];
}
