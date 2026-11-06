<?php

namespace App\Policies;

use App\Models\SwSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwSk $swSk): bool
    {
        return $user->can('View:SwSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwSk $swSk): bool
    {
        return $user->can('Update:SwSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwSk $swSk): bool
    {
        return $user->can('Delete:SwSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwSk $swSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwSk $swSk): bool
    {
        return false;
    }
}
