<?php

namespace App\Policies;

use App\Models\QbgDeklarasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgDeklarasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgDeklarasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgDeklarasi $qbgDeklarasi): bool
    {
        return $user->can('View:QbgDeklarasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgDeklarasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgDeklarasi $qbgDeklarasi): bool
    {
        return $user->can('Update:QbgDeklarasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgDeklarasi $qbgDeklarasi): bool
    {
        return $user->can('Delete:QbgDeklarasi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgDeklarasi $qbgDeklarasi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgDeklarasi $qbgDeklarasi): bool
    {
        return false;
    }
}
