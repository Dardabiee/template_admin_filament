<?php

namespace App\Policies;

use App\Models\MacSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MacSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:MacSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MacSk $macSk): bool
    {
        return $user->can('View:MacSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:MacSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MacSk $macSk): bool
    {
        return $user->can('Update:MacSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MacSk $macSk): bool
    {
        return $user->can('Delete:MacSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MacSk $macSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MacSk $macSk): bool
    {
        return false;
    }
}
