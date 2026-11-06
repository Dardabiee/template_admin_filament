<?php

namespace App\Policies;

use App\Models\QbgProduk;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgProdukPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgProduk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgProduk $qbgProduk): bool
    {
        return $user->can('View:QbgProduk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgProduk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgProduk $qbgProduk): bool
    {
        return $user->can('Update:QbgProduk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgProduk $qbgProduk): bool
    {
        return $user->can('Delete:QbgProduk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgProduk $qbgProduk): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgProduk $qbgProduk): bool
    {
        return false;
    }
}
