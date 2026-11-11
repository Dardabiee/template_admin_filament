<?php

namespace App\Policies;

use App\Models\BmnReimbust;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BmnReimbustPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:BmnReimbust');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BmnReimbust $bmnReimbust): bool
    {
        return $user->can('View:BmnReimbust');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:BmnReimbust');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BmnReimbust $bmnReimbust): bool
    {
        return $user->can('Update:BmnReimbust');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BmnReimbust $bmnReimbust): bool
    {
        return $user->can('Delete:BmnReimbust');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BmnReimbust $bmnReimbust): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BmnReimbust $bmnReimbust): bool
    {
        return false;
    }
}
