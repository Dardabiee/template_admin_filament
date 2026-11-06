<?php

namespace App\Policies;

use App\Models\PuDeklarasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuDeklarasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuDeklarasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuDeklarasi $puDeklarasi): bool
    {
        return $user->can('View:PuDeklarasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuDeklarasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuDeklarasi $puDeklarasi): bool
    {
        return $user->can('Update:PuDeklarasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuDeklarasi $puDeklarasi): bool
    {
        return $user->can('Delete:PuDeklarasi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, PuDeklarasi $puDeklarasi): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, PuDeklarasi $puDeklarasi): bool
    // {
    //     return false;
    // }
}
