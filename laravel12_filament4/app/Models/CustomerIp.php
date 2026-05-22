<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerIp extends Model
{
    protected $table = 'customer_ips';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'ip_cc' => 'integer',
        'ip_cps' => 'integer',
        'created_dt' => 'datetime',
        'updated_dt' => 'datetime',
    ];
}
