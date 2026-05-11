<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratecard extends Model
{
    protected $table = 'ratecard';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'ratecard_currency_id' => 'integer',
        'created_dt' => 'datetime',
        'updated_dt' => 'datetime',
    ];
}
