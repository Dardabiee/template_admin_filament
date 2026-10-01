<?php

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;

class MenuPolicy
{
    /**
     * Master Bypass untuk Super Admin
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('super_admin') || ($user->userLevel && strtolower($user->userLevel->level_name) === 'Super Admin')) {
            return true;
        }

        return null;
    }

    /**
     * ViewAny (HANYA 1 PARAMETER: User)
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:Menu');
    }

    /**
     * View Detail (2 Parameter: User, Record)
     */
    public function view(User $user, Menu $menu): bool
    {
        return $user->can('View:Menu');
    }

    /**
     * Create (HANYA 1 PARAMETER: User) -> PENYEBAB ERROR!
     */
    public function create(User $user): bool
    {
        return $user->can('Create:Menu');
    }

    /**
     * Update (2 Parameter: User, Record)
     */
    public function update(User $user, Menu $menu): bool
    {
        return $user->can('Update:Menu');
    }

    /**
     * Delete (2 Parameter: User, Record)
     */
    public function delete(User $user, Menu $menu): bool
    {
        return $user->can('Delete:Menu');
    }
}