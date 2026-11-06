<?php

namespace App\Policies;

use App\Models\PuHotel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuHotelPolicy
{   
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuHotel');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuHotel $puHotel): bool
    {
        return $user->can('View:PuHotel');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuHotel');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuHotel $puHotel): bool
    {
        return $user->can('Update:PuHotel');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuHotel $puHotel): bool
    {
        return $user->can('Delete:PuHotel');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuHotel $puHotel): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuHotel $puHotel): bool
    {
        return true;
    }
}
