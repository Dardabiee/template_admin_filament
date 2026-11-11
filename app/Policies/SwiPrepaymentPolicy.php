<?php

namespace App\Policies;

use App\Models\SwiPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwiPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwiPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwiPrepayment $swiPrepayment): bool
    {
        return $user->can('View:SwiPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwiPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwiPrepayment $swiPrepayment): bool
    {
        return $user->can('Update:SwiPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwiPrepayment $swiPrepayment): bool
    {
        return $user->can('Delete:SwiPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwiPrepayment $swiPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwiPrepayment $swiPrepayment): bool
    {
        return false;
    }
}
