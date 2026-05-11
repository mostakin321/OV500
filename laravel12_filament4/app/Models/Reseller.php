<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reseller extends Model
{
    protected $table = 'resellers';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [

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
