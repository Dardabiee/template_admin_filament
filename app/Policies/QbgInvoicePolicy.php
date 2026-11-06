<?php

namespace App\Policies;

use App\Models\QbgInvoice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QbgInvoicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:QbgInvoice');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QbgInvoice $qbgInvoice): bool
    {
        return $user->can('View:QbgInvoice');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:QbgInvoice');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QbgInvoice $qbgInvoice): bool
    {
        return $user->can('Update:QbgInvoice');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QbgInvoice $qbgInvoice): bool
    {
        return $user->can('Delete:QbgInvoice');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QbgInvoice $qbgInvoice): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QbgInvoice $qbgInvoice): bool
    {
        return false;
    }
}
