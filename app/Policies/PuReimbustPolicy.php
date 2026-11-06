<?php

namespace App\Policies;

use App\Models\PuReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuReimbust $puReimbust): bool
    {
        return $user->can('View:PuReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuReimbust $puReimbust): bool
    {
        return $user->can('Update:PuReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuReimbust $puReimbust): bool
    {
        return $user->can('Delete:PuReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuReimbust $puReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuReimbust $puReimbust): bool
    {
        return false;
    }
}
