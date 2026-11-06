<?php

namespace App\Policies;

use App\Models\QbgReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgReimbust $qbgReimbust): bool
    {
        return $user->can('View:QbgReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgReimbust $qbgReimbust): bool
    {
        return $user->can('Update:QbgReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgReimbust $qbgReimbust): bool
    {
        return $user->can('Delete:QbgReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgReimbust $qbgReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgReimbust $qbgReimbust): bool
    {
        return false;
    }
}
