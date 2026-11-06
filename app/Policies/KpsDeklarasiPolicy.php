<?php

namespace App\Policies;

use App\Models\KpsDeklarasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KpsDeklarasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:KpsDeklarasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KpsDeklarasi $kpsDeklarasi): bool
    {
        return $user->can('View:KpsDeklarasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:KpsDeklarasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KpsDeklarasi $kpsDeklarasi): bool
    {
        return $user->can('Update:KpsDeklarasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KpsDeklarasi $kpsDeklarasi): bool
    {
        return $user->can('Delete:KpsDeklarasi');
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  */
    // public function restore(User $user, KpsDeklarasi $kpsDeklarasi): bool
    // {
    //     return $user->can('Delete:KpsDeklarasi');
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, KpsDeklarasi $kpsDeklarasi): bool
    // {
    //     return false;
    // }
}
