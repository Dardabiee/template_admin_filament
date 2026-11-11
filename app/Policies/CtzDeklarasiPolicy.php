<?php

namespace App\Policies;

use App\Models\CtzDeklarasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CtzDeklarasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:CtzDeklarasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CtzDeklarasi $ctzDeklarasi): bool
    {
        return $user->can('View:CtzDeklarasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:CtzDeklarasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CtzDeklarasi $ctzDeklarasi): bool
    {
        return $user->can('Update:CtzDeklarasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CtzDeklarasi $ctzDeklarasi): bool
    {
        return $user->can('Delete:CtzDeklarasi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CtzDeklarasi $ctzDeklarasi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CtzDeklarasi $ctzDeklarasi): bool
    {
        return false;
    }
}
