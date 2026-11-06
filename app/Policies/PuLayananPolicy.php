<?php

namespace App\Policies;

use App\Models\PuLayanan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuLayananPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuLayanan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuLayanan $puLayanan): bool
    {
        return $user->can('View:PuLayanan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuLayanan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuLayanan $puLayanan): bool
    {
        return $user->can('Update:PuLayanan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuLayanan $puLayanan): bool
    {
        return $user->can('Delete:PuLayanan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuLayanan $puLayanan): bool
    {
        return $user->can('View:PuLayanan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuLayanan $puLayanan): bool
    {
        return false;
    }
}
