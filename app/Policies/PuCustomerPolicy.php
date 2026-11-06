<?php

namespace App\Policies;

use App\Models\PuCustomer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuCustomerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuCustomer');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuCustomer $puCustomer): bool
    {
        return $user->can('View:PuCustomer');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuCustomer');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuCustomer $puCustomer): bool
    {
        return $user->can('Update:PuCustomer');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuCustomer $puCustomer): bool
    {
        return $user->can('Delete:PuCustomer');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuCustomer $puCustomer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuCustomer $puCustomer): bool
    {
        return false;
    }
}
