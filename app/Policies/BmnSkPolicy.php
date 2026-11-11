<?php

namespace App\Policies;

use App\Models\BmnSk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BmnSkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:BmnSk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BmnSk $bmnSk): bool
    {
        return $user->can('View:BmnSk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:BmnSk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BmnSk $bmnSk): bool
    {
        return $user->can('Update:BmnSk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BmnSk $bmnSk): bool
    {
        return $user->can('Delete:BmnSk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BmnSk $bmnSk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BmnSk $bmnSk): bool
    {
        return false;
    }
}
