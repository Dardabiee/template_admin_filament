<?php

namespace App\Policies;

use App\Models\BmnPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BmnPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:BmnPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BmnPrepayment $bmnPrepayment): bool
    {
        return $user->can('View:BmnPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:BmnPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BmnPrepayment $bmnPrepayment): bool
    {
        return $user->can('Update:BmnPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BmnPrepayment $bmnPrepayment): bool
    {
        return $user->can('Delete:BmnPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BmnPrepayment $bmnPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BmnPrepayment $bmnPrepayment): bool
    {
        return false;
    }
}
