<?php

namespace App\Policies;

use App\Models\MacPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MacPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:MacPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MacPrepayment $macPrepayment): bool
    {
        return $user->can('View:MacPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:MacPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MacPrepayment $macPrepayment): bool
    {
        return $user->can('Update:MacPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MacPrepayment $macPrepayment): bool
    {
        return $user->can('Delete:MacPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MacPrepayment $macPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MacPrepayment $macPrepayment): bool
    {
        return false;
    }
}
