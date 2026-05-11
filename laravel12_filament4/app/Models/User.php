<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $table = 'users';

    protected $guarded = [];

    public $timestamps = false;

    protected $hidden = [
        'secret',
    ];

    protected $casts = [
        'create_dt' => 'datetime',
        'update_dt' => 'datetime',
    ];

    public function getAuthPassword(): string
    {
        return (string) $this->secret;
    }

    public function balance(): BelongsTo
    {
        return $this->belongsTo(CustomerBalance::class, 'account_id', 'account_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'account_id', 'account_id');
    }

    public function reseller(): BelongsTo
    {
        return $this->belongsTo(Reseller::class, 'account_id', 'account_id');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return (int) ($this->status_id ?? 0) === 1;
    }
}
