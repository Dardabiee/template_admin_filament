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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use Filament\Support\Assets\Css;
use Filament\Enums\UserMenuPosition;
use Illuminate\Support\Str;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            // Aktifkan baris ini jika ingin menggunakan menu dari database:
            ->navigationItems(self::getDynamicNavigationItems())
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->assets([
                Css::make('custom-stylesheet', asset('css/filament/custom.css')) 
            ])
            ->brandLogo(asset('images/logo-holding Background Removed.png'))
            ->brandLogoHeight('5rem')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->sidebarFullyCollapsibleOnDesktop()
            ->userMenu(position: UserMenuPosition::Sidebar)
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                ValidateCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make()
                ->gridColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 1,
                ])
                ->sectionColumnSpan(1)
                ->checkboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                    'md' => 3,
                    'lg' => 4,
                    'xl' => 5
                ])
                ->resourceCheckboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 5
                ]),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    /**
     * Membangun array navigasi dinamis dari database (Aman dari Bypass Shield)
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
                    $cleanTitle = Str::singular(Str::studly(basename($parent -> url ?? $parent->title  )));
                    $permissionKey = 'View:' . $cleanTitle;

                    $items[] = NavigationItem::make($parent->title)
                        ->url(self::resolveUrl($parent->url))
                        ->icon($parent->icon ?: 'heroicon-o-rectangle-stack')
                        ->sort($parent->order)
                        // Perlindungan Otorisasi: Hanya tampil jika user punya permission 'View:Menu'
                        ->visible(fn () => auth()->user()?->can($permissionKey) ?? true);
                }
            }

            return $items;
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Helper rekursif untuk child & sub-child menu
     */
    private static function buildNestedNavigation($children, string $groupName, array &$items): void
    {
        foreach ($children as $child) {
            $cleanTitle = Str::singular(Str::studly(basename($child -> url ?? $child->title  )));
            $permissionKey = 'View:' . $cleanTitle;
            $items[] = NavigationItem::make($child->title)
                ->url(self::resolveUrl($child->url))
                ->icon($child->icon)
                ->group($groupName)
                ->sort($child->order)
                // Perlindungan Otorisasi
                ->visible(fn () => auth()->user()?->can($permissionKey) ?? true);

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

        if (Route::has($path)) {
            return route($path);
        }

        return url($path);
    }
}