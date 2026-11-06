<?php

namespace App\Policies;

use App\Models\SwReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwReimbust $swReimbust): bool
    {
        return $user->can('View:SwReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwReimbust $swReimbust): bool
    {
        return $user->can('Update:SwReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwReimbust $swReimbust): bool
    {
        return $user->can('Delete:SwReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwReimbust $swReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwReimbust $swReimbust): bool
    {
        return false;
    }
}
