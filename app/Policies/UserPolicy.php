<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPolicy
{
    
    private function getPermissionName(string $action, ?Model $model = null): string {
        
       // Jika model tersedia, ambil nama kelasnya (misal: "User")
        // Jika tidak, kita bisa tebak dari nama policy-nya (UserPolicy -> User)
        $modelName = $model ? class_basename($model) : str_replace('Policy', '', class_basename(static::class));
        return "{$action}:{$modelName}";
    }

    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->can($this->getPermissionName('View'));
    }

    public function view(User $user, Model $model): bool
    {
        return $user->can($this->getPermissionName('View', $model));
    }

    public function create(User $user): bool
    {
        return $user->can($this->getPermissionName('Create'));
    }

    public function update(User $user, Model $model): bool
    {
        return $user->can($this->getPermissionName('Update', $model));
    }

    public function delete(User $user, Model $model): bool
    {
        return $user->can($this->getPermissionName('Delete', $model));
    }
}