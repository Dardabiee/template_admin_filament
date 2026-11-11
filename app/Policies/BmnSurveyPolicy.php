<?php

namespace App\Policies;

use App\Models\BmnSurvey;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BmnSurveyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('View:BmnSurvey');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BmnSurvey $bmnSurvey): bool
    {
        return $user->can('View:BmnSurvey');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Create:BmnSurvey');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BmnSurvey $bmnSurvey): bool
    {
        return $user->can('Update:BmnSurvey');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BmnSurvey $bmnSurvey): bool
    {
        return $user->can('Delete:BmnSurvey');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BmnSurvey $bmnSurvey): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BmnSurvey $bmnSurvey): bool
    {
        return false;
    }
}
