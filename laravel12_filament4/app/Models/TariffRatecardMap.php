<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TariffRatecardMap extends Model
{
    protected $table = 'tariff_ratecard_map';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'start_day' => 'integer',
        'end_day' => 'integer',
        'priority' => 'integer',
        'created_dt' => 'datetime',
        'updated_dt' => 'datetime',
    ];
}
