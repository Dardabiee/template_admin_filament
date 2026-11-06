<?php

namespace App\Policies;

use App\Models\PuLandArrangement;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuLandArrangementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuLandArrangement');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuLandArrangement $puLandArrangement): bool
    {
        return $user->can('View:PuLandArrangement');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuLandArrangement');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuLandArrangement $puLandArrangement): bool
    {
        return $user->can('Update:PuLandArrangement');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuLandArrangement $puLandArrangement): bool
    {
        return $user->can('Delete:PuLandArrangement');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuLandArrangement $puLandArrangement): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuLandArrangement $puLandArrangement): bool
    {
        return false;
    }
}
