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
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->can('View:Menu');
    }

    public function view(User $user, Menu $menu): bool
    {
        return $user->can('View:Menu');
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Menu');
    }

    public function update(User $user, Menu $menu): bool
    {
        return $user->can('Update:Menu');
    }

    public function delete(User $user, Menu $menu): bool
    {
        return $user->can('Delete:Menu');
    }
}