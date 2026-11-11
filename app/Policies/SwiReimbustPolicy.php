<?php

namespace App\Policies;

use App\Models\SwiReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwiReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwiReimbust');;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwiReimbust $swiReimbust): bool
    {
        return $user->can('View:SwiReimbust');;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwiReimbust');;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwiReimbust $swiReimbust): bool
    {
        return $user->can('Update:SwiReimbust');;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwiReimbust $swiReimbust): bool
    {
        return $user->can('Delete:SwiReimbust');;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwiReimbust $swiReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwiReimbust $swiReimbust): bool
    {
        return false;
    }
}
