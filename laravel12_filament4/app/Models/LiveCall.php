<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function isAnswered(): Attribute
    {
        return Attribute::get(fn (): bool => $this->answer_time !== null);
    }

    protected function callDurationSeconds(): Attribute
    {
        return Attribute::get(function (): ?int {
            if ($this->start_time === null) {
                return null;
            }

            return max(0, $this->start_time->diffInSeconds($this->end_time ?? now()));
        });
    }

    protected function acdDurationSeconds(): Attribute
    {
        return Attribute::get(function (): ?int {
            if ($this->answer_time === null) {
                return null;
            }

            return max(0, $this->answer_time->diffInSeconds($this->end_time ?? now()));
        });
    }
}

