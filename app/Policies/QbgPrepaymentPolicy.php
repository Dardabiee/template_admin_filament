<?php

namespace App\Policies;

use App\Models\QbgPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgPrepayment $qbgPrepayment): bool
    {
        return $user->can('View:QbgPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgPrepayment $qbgPrepayment): bool
    {
        return $user->can('Update:QbgPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgPrepayment $qbgPrepayment): bool
    {
        return $user->can('Delete:QbgPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgPrepayment $qbgPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgPrepayment $qbgPrepayment): bool
    {
        return false;
    }
}
