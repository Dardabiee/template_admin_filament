<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    /**
     * Master Bypass Super Admin
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('super_admin') || ($user->userLevel && strtolower($user->userLevel->level_name) === 'super admin')) {
            return true;
        }

        return null;
    }

    /**
     * ViewAny (HANYA 1 PARAMETER: User) -> PENYEBAB ERROR!
     */
    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Role') || $user->can('View:Role');
    }

    /**
     * View Detail (2 parameter: User, Record)
     */
    public function view(User $user, Role $role): bool
    {
        return $user->can('View:Role');
    }

    /**
     * Create (HANYA 1 PARAMETER: User)
     */
    public function create(User $user): bool
    {
        return $user->can('Create:Role');
    }

    /**
     * Update (2 parameter: User, Record)
     */
    public function update(User $user, Role $role): bool
    {
        return $user->can('Update:Role');
    }

    /**
     * Delete (2 parameter: User, Record)
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->can('Delete:Role');
    }
}