<?php

namespace App\Policies;

use App\Models\MacReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MacReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:MacReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MacReimbust $macReimbust): bool
    {
        return $user->can('View:MacReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:MacReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MacReimbust $macReimbust): bool
    {
        return $user->can('Update:MacReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MacReimbust $macReimbust): bool
    {
        return $user->can('Delete:MacReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MacReimbust $macReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MacReimbust $macReimbust): bool
    {
        return false;
    }
}
