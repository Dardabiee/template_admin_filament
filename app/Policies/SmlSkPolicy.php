<?php

namespace App\Policies;

use App\Models\SmlSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SmlSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SmlSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SmlSk $smlSk): bool
    {
        return $user->can('View:SmlSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SmlSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SmlSk $smlSk): bool
    {
        return $user->can('Update:SmlSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SmlSk $smlSk): bool
    {
        return $user->can('Delete:SmlSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SmlSk $smlSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SmlSk $smlSk): bool
    {
        return false;
    }
}
