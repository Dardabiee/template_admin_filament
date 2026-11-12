<?php

namespace App\Policies;

use App\Models\MacDeklarasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MacDeklarasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:MacDeklarasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MacDeklarasi $macDeklarasi): bool
    {
        return $user->can('View:MacDeklarasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:MacDeklarasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MacDeklarasi $macDeklarasi): bool
    {
        return $user->can('Update:MacDeklarasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MacDeklarasi $macDeklarasi): bool
    {
        return $user->can('Delete:MacDeklarasi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MacDeklarasi $macDeklarasi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MacDeklarasi $macDeklarasi): bool
    {
        return false;
    }
}
