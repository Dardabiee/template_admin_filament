<?php

namespace App\Observers;

use App\Models\Menu;
use Spatie\Permission\Models\Permission;

class MenuObserver
{
    /**
     * Handle the Menu "created" event.
     */
    public function created(Menu $menu): void
    {
        $this->createPermissions($menu->title);
    }

    /**
     * Handle the Menu "updated" event.
     */
    public function updated(Menu $menu): void
    {
        // Jika judul menu diubah, update nama permission terkait
        if ($menu->isDirty('title')) {
            $oldTitle = $menu->getOriginal('title');
            $this->deletePermissions($oldTitle);
            $this->createPermissions($menu->title);
        }

        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    /**
     * Handle the Menu "deleted" event.
     */
    public function deleted(Menu $menu): void
    {
        $this->deletePermissions($menu->title);
    }

    /**
     * Helper membuat permission baru
     */
    private function createPermissions(string $title): void
    {
        $permissionNames = [
            'View:' . $title,
            'Create:' . $title,
            'Update:' . $title,
            'Delete:' . $title,
        ];

        foreach ($permissionNames as $name) {
            Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
            ]);
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    /**
     * Helper menghapus permission
     */
    private function deletePermissions(string $title): void
    {
        $permissionNames = [
            'View:' . $title,
            'Create:' . $title,
            'Update:' . $title,
            'Delete:' . $title,
        ];

        Permission::whereIn('name', $permissionNames)->delete();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}