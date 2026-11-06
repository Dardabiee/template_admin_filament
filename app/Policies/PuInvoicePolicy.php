<?php

namespace App\Policies;

use App\Models\PuInvoice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuInvoicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:PuInvoice');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PuInvoice $puInvoice): bool
    {
        return $user->can('View:PuInvoice');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:PuInvoice');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PuInvoice $puInvoice): bool
    {
        return $user->can('Update:PuInvoice');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PuInvoice $puInvoice): bool
    {
        return $user->can('Delete:PuInvoice');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PuInvoice $puInvoice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PuInvoice $puInvoice): bool
    {
        return false;
    }
}
