<?php

namespace App\Policies;

use App\Models\KpsSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KpsSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:KpsSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KpsSk $kpsSk): bool
    {
        return $user->can('View:KpsSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:KpsSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KpsSk $kpsSk): bool
    {
        return $user->can('Update:KpsSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KpsSk $kpsSk): bool
    {
        return $user->can('Delete:KpsSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KpsSk $kpsSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KpsSk $kpsSk): bool
    {
        return false;
    }
}
