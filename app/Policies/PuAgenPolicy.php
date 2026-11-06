<?php

namespace App\Policies;

use App\Models\PuAgen;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuAgenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuAgen');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuAgen $puAgen): bool
    {
        return $user->can('View:PuAgen');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuAgen');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuAgen $puAgen): bool
    {
        return $user->can('Update:PuAgen');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuAgen $puAgen): bool
    {
        return $user->can('Delete:PuAgen');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuAgen $puAgen): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuAgen $puAgen): bool
    {
        return false;
    }
}
