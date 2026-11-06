<?php

namespace App\Policies;

use App\Models\QbgSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgSk $qbgSk): bool
    {
        return $user->can('View:QbgSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgSk $qbgSk): bool
    {
        return $user->can('Update:QbgSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgSk $qbgSk): bool
    {
        return $user->can('Delete:QbgSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgSk $qbgSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgSk $qbgSk): bool
    {
        return false;
    }
}
