<?php

namespace App\Policies;

use App\Models\PuTravel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuTravelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuTravel');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuTravel $puTravel): bool
    {
        return $user->can('View:PuTravel');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuTravel');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuTravel $puTravel): bool
    {
        return $user->can('Update:PuTravel');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuTravel $puTravel): bool
    {
        return $user->can('Delete:PuTravel');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuTravel $puTravel): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuTravel $puTravel): bool
    {
        return false;
    }
}
