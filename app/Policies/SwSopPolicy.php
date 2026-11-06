<?php

namespace App\Policies;

use App\Models\SwSop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwSopPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwSop');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwSop $swSop): bool
    {
        return $user->can('View:SwSop');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwSop');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwSop $swSop): bool
    {
        return $user->can('Update:SwSop');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwSop $swSop): bool
    {
        return $user->can('Delete:SwSop');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwSop $swSop): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwSop $swSop): bool
    {
        return false;
    }
}
