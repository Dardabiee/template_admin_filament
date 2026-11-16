<?php

namespace App\Policies;

use App\Models\SmlSop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SmlSopPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SmlSop');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SmlSop $smlSop): bool
    {
        return $user->can('View:SmlSop');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SmlSop');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SmlSop $smlSop): bool
    {
        return $user->can('Update:SmlSop');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SmlSop $smlSop): bool
    {
        return $user->can('Delete:SmlSop');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SmlSop $smlSop): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SmlSop $smlSop): bool
    {
        return false;
    }
}
