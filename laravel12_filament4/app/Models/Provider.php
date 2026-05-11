<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'currency_id' => 'integer',
        'created_dt' => 'datetime',
        'updated_dt' => 'datetime',
    ];
}
