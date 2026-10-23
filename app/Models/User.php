<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'userlevel_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // 3. Tambahkan method wajib dari FilamentUser ini di dalam class:
    public function canAccessPanel(Panel $panel): bool
    {
        // Contoh validasi: izinkan user yang punya role tertentu, 
        // atau untuk testing awal bisa return true (pastikan nanti dibatasi sesuai kebutuhan keamanan)
        // return true; 
        
        // Atau jika ingin membatasi berdasarkan role Spatie:
        return $this->hasAnyRole(['Super Admin', 'Admin', 'Finance', 'Direksi']);
    }

    // Relasi balik ke UserLevel
    // public function userLevel(): BelongsTo
    // {
    //     return $this->belongsTo(UserLevel::class, 'userlevel_id');
    // }
}