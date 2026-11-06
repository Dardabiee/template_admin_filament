<?php

namespace App\Policies;

use App\Models\PuPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuPrepayment $puPrepayment): bool
    {
        return $user->can('View:PuPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuPrepayment $puPrepayment): bool
    {
        return $user->can('Update:PuPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuPrepayment $puPrepayment): bool
    {
        return $user->can('Delete:PuPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuPrepayment $puPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuPrepayment $puPrepayment): bool
    {
        return false;
    }
}
