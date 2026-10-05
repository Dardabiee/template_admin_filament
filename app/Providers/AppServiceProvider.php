<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Menu;
use App\Observers\MenuObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

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
        return $user->hasRole('super_admin') ? true : null ;
            
        });
        Menu::observe(MenuObserver::class);

        // if (Schema::hasTable('permissions')) {
        //     $customPermissions = Permission::whereNotIn('name', function ($query) {
        //         $query->select('name')->from('permissions')->where('name', 'like', '%Role%');
        //     })->pluck('name')->toArray();

        //     config(['filament-shield.custom_permissions' => $customPermissions]);
        // }

        // Event::listen([
        //     RoleAttachedEvent::class,
        //     RoleDetachedEvent::class,
        //     PermissionAttachedEvent::class,
        //     PermissionDetachedEvent::class,
        //     \Spatie\Permission\Events\RoleUpdatedEvent::class,
        // ], function ($event) {
        //     // Reset cache global Spatie
        //     app(PermissionRegistrar::class)->forgetCachedPermissions();

        //     // Jika event melibatkan model User (misal role dipasang ke user), 
        //     // kita bisa clear cache spesifik model tersebut jika didukung, 
        //     // atau cukup flush cache permission secara menyeluruh.
        //     // cache()->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
        //     //     ->forget(config('permission.cache.key'));
        // })
    }
}
