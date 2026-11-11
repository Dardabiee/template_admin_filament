<?php

namespace App\Policies;

use App\Models\SwiSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwiSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwiSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwiSk $swiSk): bool
    {
        return $user->can('View:SwiSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwiSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwiSk $swiSk): bool
    {
        return $user->can('Update:SwiSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwiSk $swiSk): bool
    {
        return $user->can('Delete:SwiSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwiSk $swiSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwiSk $swiSk): bool
    {
        return false;
    }
}
