<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Userlevel;

class UserlevelPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole('Super Admin') || ($user->userLevel && strtolower($user->userLevel->level_name) === 'super admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user): bool
    {
        return $user->can('View:Userlevel');
    }

    public function view(User $user, Userlevel $userlevel): bool
    {
        return $user->can('View:Userlevel');
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Userlevel');
    }

    public function update(User $user, Userlevel $userlevel): bool
    {
        return $user->can('Update:Userlevel');
    }

    public function delete(User $user, Userlevel $userlevel): bool
    {
        return $user->can('Delete:Userlevel');
    }
}