<?php

namespace App\Policies;

use App\Models\QbgTransaksi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgTransaksiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgTransaksi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgTransaksi $qbgTransaksi): bool
    {
        return $user->can('View:QbgTransaksi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgTransaksi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgTransaksi $qbgTransaksi): bool
    {
        return $user->can('Update:QbgTransaksi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgTransaksi $qbgTransaksi): bool
    {
        return $user->can('Delete:QbgTransaksi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgTransaksi $qbgTransaksi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgTransaksi $qbgTransaksi): bool
    {
        return false;
    }
}
