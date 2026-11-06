<?php

namespace App\Policies;

use App\Models\PuPenawaran;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuPenawaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuPenawaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuPenawaran $puPenawaran): bool
    {
        return $user->can('View:PuPenawaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuPenawaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuPenawaran $puPenawaran): bool
    {
        return $user->can('Update:PuPenawaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuPenawaran $puPenawaran): bool
    {
        return $user->can('Delete:PuPenawaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuPenawaran $puPenawaran): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuPenawaran $puPenawaran): bool
    {
        return false;
    }
}
