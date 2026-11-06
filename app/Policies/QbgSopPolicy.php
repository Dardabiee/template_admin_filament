<?php

namespace App\Policies;

use App\Models\QbgSop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgSopPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgSop');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgSop $qbgSop): bool
    {
        return $user->can('View:QbgSop');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgSop');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgSop $qbgSop): bool
    {
        return $user->can('Update:QbgSop');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgSop $qbgSop): bool
    {
        return $user->can('Delete:QbgSop');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgSop $qbgSop): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgSop $qbgSop): bool
    {
        return false;
    }
}
