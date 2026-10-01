<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::before(function (User $user, string $ability) {
        if ($user->hasRole('super_admin') || ($user->userLevel && strtolower($user->userLevel->level_name) === 'super admin')) {
            return true;
        }
    });
    }
}
