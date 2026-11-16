<?php

namespace App\Policies;

use App\Models\SmlPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SmlPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SmlPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SmlPrepayment $smlPrepayment): bool
    {
        return $user->can('View:SmlPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SmlPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SmlPrepayment $smlPrepayment): bool
    {
        return $user->can('Update:SmlPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SmlPrepayment $smlPrepayment): bool
    {
        return $user->can('Delete:SmlPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SmlPrepayment $smlPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SmlPrepayment $smlPrepayment): bool
    {
        return false;
    }
}
