<?php

namespace App\Policies;

use App\Models\HmPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HmPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:HmPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HmPrepayment $hmPrepayment): bool
    {
        return $user->can('View:HmPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:HmPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HmPrepayment $hmPrepayment): bool
    {
        return $user->can('Update:HmPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HmPrepayment $hmPrepayment): bool
    {
        return $user->can('Delete:HmPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HmPrepayment $hmPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HmPrepayment $hmPrepayment): bool
    {
        return false;
    }
}
