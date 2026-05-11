<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResellerDialplan extends Model
{
    protected $table = 'reseller_dialplan';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'create_dt' => 'datetime',
    ];
}
