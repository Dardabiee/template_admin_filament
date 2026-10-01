<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Userlevel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserlevelPolicy
{
    use HandlesAuthorization;
    
    public function view(AuthUser $authUser, Userlevel $userlevel): bool
    {
        return $authUser->can('View:Userlevel');
    }

    public function create(AuthUser $authUser, Userlevel $userlevel): bool
    {
        return $authUser->can('Create:Userlevel');
    }

    public function update(AuthUser $authUser, Userlevel $userlevel): bool
    {
        return $authUser->can('Update:Userlevel');
    }

    public function delete(AuthUser $authUser, Userlevel $userlevel): bool
    {
        return $authUser->can('Delete:Userlevel');
    }

}