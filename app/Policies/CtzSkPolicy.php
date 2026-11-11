<?php

namespace App\Policies;

use App\Models\CtzSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CtzSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:CtzSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CtzSk $ctzSk): bool
    {
        return $user->can('View:CtzSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:CtzSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CtzSk $ctzSk): bool
    {
        return $user->can('Update:CtzSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CtzSk $ctzSk): bool
    {
        return $user->can('Delete:CtzSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CtzSk $ctzSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CtzSk $ctzSk): bool
    {
        return false;
    }
}
