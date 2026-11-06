<?php

namespace App\Policies;

use App\Models\KpsSop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KpsSopPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:KpsSop');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KpsSop $kpsSop): bool
    {
        return $user->can('View:KpsSop');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:KpsSop');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KpsSop $kpsSop): bool
    {
        return $user->can('Update:KpsSop');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KpsSop $kpsSop): bool
    {
        return $user->can('Delete:KpsSop');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KpsSop $kpsSop): bool
    {
        return $user->can('Restore:KpsSop');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KpsSop $kpsSop): bool
    {
        return $user->can('ForceDelete:KpsSop');
    }
}
