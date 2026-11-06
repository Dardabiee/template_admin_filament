<?php

namespace App\Policies;

use App\Models\SwInvoice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwInvoicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:SwInvoice');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SwInvoice $swInvoice): bool
    {
        return $user->can('View:SwInvoice');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:SwInvoice');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SwInvoice $swInvoice): bool
    {
        return $user->can('Update:SwInvoice');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SwInvoice $swInvoice): bool
    {
        return $user->can('Delete:SwInvoice');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SwInvoice $swInvoice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SwInvoice $swInvoice): bool
    {
        return false;
    }
}
