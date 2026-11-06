<?php

namespace App\Policies;

use App\Models\KpsReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KpsReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:KpsReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KpsReimbust $kpsReimbust): bool
    {
        return $user->can('View:KpsReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:KpsReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KpsReimbust $kpsReimbust): bool
    {
        return $user->can('Update:KpsReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KpsReimbust $kpsReimbust): bool
    {
        return $user->can('Delete:KpsReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KpsReimbust $kpsReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KpsReimbust $kpsReimbust): bool
    {
        return $user->can('Delete:KpsReimbust');
    }
}
