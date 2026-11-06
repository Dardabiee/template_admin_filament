<?php

namespace App\Policies;

use App\Models\KpsPrepayment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KpsPrepaymentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:KpsPrepayment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KpsPrepayment $kpsPrepayment): bool
    {
        return $user->can('View:KpsPrepayment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:KpsPrepayment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KpsPrepayment $kpsPrepayment): bool
    {
        return $user->can('Update:KpsPrepayment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KpsPrepayment $kpsPrepayment): bool
    {
        return $user->can('Delete:KpsPrepayment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, KpsPrepayment $kpsPrepayment): bool
    // {
    //     return $user->can('View:KpsPrepayment');
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KpsPrepayment $kpsPrepayment): bool
    {
        return $user->can('Delete:KpsPrepayment');
    }
}
