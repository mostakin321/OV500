<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerDialplan extends Model
{
    protected $table = 'customer_dialplan';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'created_dt' => 'datetime',
        'updated_dt' => 'datetime',
    ];
}
