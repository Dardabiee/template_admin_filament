<?php

namespace App\Policies;

use App\Models\SwPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwPrepayment $swPrepayment): bool
    {
        return $user->can('View:SwPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwPrepayment $swPrepayment): bool
    {
        return $user->can('Update:SwPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwPrepayment $swPrepayment): bool
    {
        return $user->can('Delete:SwPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, SwPrepayment $swPrepayment): bool
    // {
    //     return $user->can('View:SwPrepayment');
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, SwPrepayment $swPrepayment): bool
    // {
    //     return $user->can('View:SwPrepayment');
    // }
}
