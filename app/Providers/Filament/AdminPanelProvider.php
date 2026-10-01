<?php

namespace App\Providers\Filament;

use App\Models\Menu;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->navigationItems(self::getDynamicNavigationItems())
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                ValidateCsrfToken::class,
                // PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

        /**
     * Membangun array navigasi dinamis dari database
     */
    private static function getDynamicNavigationItems(): array
    {
      try {
          if (! Schema::hasTable('menus')) {
            return [];
        }

        $items = [];

        $parentMenus = Menu::whereNull('parent_id')
            ->where('is_active', true)
            ->with('childrenRecursive')
            ->orderBy('order', 'asc')
            ->get();

        foreach ($parentMenus as $parent) {
            if ($parent->childrenRecursive->isNotEmpty()) {
                self::buildNestedNavigation($parent->childrenRecursive, $parent->title, $items);
            } else {
                $items[] = NavigationItem::make($parent->title)
                    ->url($parent->url ? url($parent->url) : '#')
                    ->icon($parent->icon ?: 'heroicon-o-rectangle-stack')
                    ->sort($parent->order);
            }
        }

        return $items;
      } catch(\Throwable $e) {
            return [];
      }
    }

    /**
     * Helper rekursif untuk child & sub-child menu
     */
    private static function buildNestedNavigation($children, string $groupName, array &$items): void
    {
        foreach ($children as $child) {
            $items[] = NavigationItem::make($child->title)
                ->url($child->url ? url($child->url) : '#')
                ->icon($child->icon ?: 'heroicon-o-chevron-right')
                ->group($groupName)
                ->sort($child->order);

            if ($child->childrenRecursive && $child->childrenRecursive->isNotEmpty()) {
                self::buildNestedNavigation($child->childrenRecursive, $child->title, $items);
            }
        }
    }

    /**
     * Helper resolusi URL (Mendukung Named Routes & Raw Links)
     */
    private static function resolveUrl(?string $path): string
    {
        if (! $path) {
            return '#';
        }

        // Jika value di database berupa Named Route (contoh: filament.admin.resources.users.index)
        if (Route::has($path)) {
            return route($path);
        }

        // Jika value berupa relative path atau full URL
        return url($path);
    }
   
}
