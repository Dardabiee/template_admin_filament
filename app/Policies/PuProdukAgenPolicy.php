<?php

namespace App\Policies;

use App\Models\PuProdukAgen;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuProdukAgenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuProdukAgen');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuProdukAgen $puProdukAgen): bool
    {
        return $user->can('View:PuProdukAgen');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuProdukAgen');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuProdukAgen $puProdukAgen): bool
    {
        return $user->can('Update:PuProdukAgen');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuProdukAgen $puProdukAgen): bool
    {
        return $user->can('Delete:PuProdukAgen');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuProdukAgen $puProdukAgen): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuProdukAgen $puProdukAgen): bool
    {
        return false;
    }
}
