<?php

namespace App\Policies;

use App\Models\BmnDeklarasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BmnDeklarasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:BmnDeklarasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BmnDeklarasi $bmnDeklarasi): bool
    {
        return $user->can('View:BmnDeklarasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:BmnDeklarasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BmnDeklarasi $bmnDeklarasi): bool
    {
        return $user->can('Update:BmnDeklarasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BmnDeklarasi $bmnDeklarasi): bool
    {
        return $user->can('Delete:BmnDeklarasi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BmnDeklarasi $bmnDeklarasi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BmnDeklarasi $bmnDeklarasi): bool
    {
        return false;
    }
}
