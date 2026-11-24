<?php

namespace App\Policies;

use App\Models\HmReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HmReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:HmReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HmReimbust $hmReimbust): bool
    {
        return $user->can('View:HmReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:HmReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HmReimbust $hmReimbust): bool
    {
        return $user->can('Update:HmReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HmReimbust $hmReimbust): bool
    {
        return $user->can('Delete:HmReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HmReimbust $hmReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HmReimbust $hmReimbust): bool
    {
        return false;
    }
}
