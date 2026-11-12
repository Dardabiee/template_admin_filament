<?php

namespace App\Policies;

use App\Models\MacSop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MacSopPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:MacSop');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MacSop $macSop): bool
    {
        return $user->can('View:MacSop');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:MacSop');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MacSop $macSop): bool
    {
        return $user->can('Update:MacSop');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MacSop $macSop): bool
    {
        return $user->can('Update:MacSop');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MacSop $macSop): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MacSop $macSop): bool
    {
        return false;
    }
}
