<?php

namespace App\Policies;

use App\Models\BmnSop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BmnSopPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:BmnSop');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BmnSop $bmnSop): bool
    {
        return $user->can('View:BmnSop');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:BmnSop');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BmnSop $bmnSop): bool
    {
        return $user->can('Update:BmnSop');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BmnSop $bmnSop): bool
    {
        return $user->can('Delete:BmnSop');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BmnSop $bmnSop): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BmnSop $bmnSop): bool
    {
        return false;
    }
}
