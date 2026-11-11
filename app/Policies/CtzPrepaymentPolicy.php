<?php

namespace App\Policies;

use App\Models\CtzPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CtzPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:CtzPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CtzPrepayment $ctzPrepayment): bool
    {
        return $user->can('View:CtzPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:CtzPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CtzPrepayment $ctzPrepayment): bool
    {
        return $user->can('Update:CtzPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CtzPrepayment $ctzPrepayment): bool
    {
        return $user->can('Delete:CtzPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CtzPrepayment $ctzPrepayment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CtzPrepayment $ctzPrepayment): bool
    {
        return false;
    }
}
