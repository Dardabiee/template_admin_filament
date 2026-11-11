<?php

namespace App\Policies;

use App\Models\CtzReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CtzReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:CtzReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CtzReimbust $ctzReimbust): bool
    {
        return $user->can('View:CtzReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:CtzReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CtzReimbust $ctzReimbust): bool
    {
        return $user->can('Create:CtzReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CtzReimbust $ctzReimbust): bool
    {
        return $user->can('Delete:CtzReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CtzReimbust $ctzReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CtzReimbust $ctzReimbust): bool
    {
        return false;
    }
}
