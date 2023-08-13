<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Login;
use Awcodes\FilamentQuickCreate\QuickCreatePlugin;
use Awcodes\FilamentVersions\VersionsPlugin;
use Awcodes\FilamentVersions\VersionsWidget;
use Awcodes\Overlook\OverlookPlugin;
use Awcodes\Overlook\Widgets\OverlookWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Contracts\View\View;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use LaraZeus\Bolt\BoltPlugin;
use LaraZeus\Bolt\Filament\Resources\ResponseResource;
use LaraZeus\Rain\RainPlugin;
use LaraZeus\Rhea\RheaPlugin;
use LaraZeus\Sky\SkyPlugin;
use LaraZeus\Thunder\Filament\Resources\OperationsResource;
use LaraZeus\Thunder\Filament\Resources\TicketResource;
use LaraZeus\Thunder\ThunderPlugin;
use LaraZeus\Wind\Filament\Resources\LetterResource;
use LaraZeus\Wind\WindPlugin;
use RyanChandler\FilamentNavigation\FilamentNavigation;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->homeUrl('/')
            ->id('admin')
            ->path('admin')

            ->login(Login::class)
            ->profile()

            ->plugins([
                OverlookPlugin::make()
                    ->sort(5)
                    ->excludes([
                        ResponseResource::class,
                        LetterResource::class,
                        OperationsResource::class,
                        TicketResource::class,
                    ])
                    ->alphabetical(),

                VersionsPlugin::make()
                    ->widgetSort(4)
                    ->widgetColumnSpan('full')
                    ->items([
                        new MyCustomVersionProvider(),
                    ]),

                SpatieLaravelTranslatablePlugin::make()
                    //->defaultLocales(array_keys(config('app.locales')))
                    ->defaultLocales(['en']),

                QuickCreatePlugin::make()
                    ->excludes([
                        ResponseResource::class,
                        LetterResource::class,
                        OperationsResource::class,
                        TicketResource::class,
                    ]),

                WindPlugin::make(),
                SkyPlugin::make(),
                BoltPlugin::make()
                ->extensions([
                    \LaraZeus\Thunder\Extensions\Thunder::class
                ]),
                ThunderPlugin::make(),
                RainPlugin::make(),
                RheaPlugin::make(),
                FilamentNavigation::make(),
            ])

            //->topNavigation()
            ->maxContentWidth('full')
            ->sidebarCollapsibleOnDesktop()
            ->colors([
                'gray' => Color::Stone,
                'primary' => Color::hex('#45B39D'),
                'custom' => Color::hex('#45B39D'),
                'secondary' => Color::hex('#F1948A'),
            ])
            ->favicon(asset('favicon.ico'))

            ->navigationGroups([
                'App',
                'Wind',
                'Sky',
                'Bolt',
                'Thunder',
                'Rain',
                'Rhea',
            ])

            ->renderHook(
                'zeus-forms.before',
                fn(): View => view('filament.hooks.placeholder', ['data' => 'zeus-forms.before']),
            )
            ->renderHook(
                'zeus-forms.after',
                fn(): View => view('filament.hooks.placeholder', ['data' => 'zeus-forms.after']),
            )
            ->renderHook(
                'zeus-form.before',
                fn(): View => view('filament.hooks.placeholder', ['data' => 'zeus-form.before']),
            )
            ->renderHook(
                'zeus-form.after',
                fn(): View => view('filament.hooks.placeholder', ['data' => 'zeus-form.after']),
            )
            ->renderHook(
                'panels::content.start',
                fn(): View => view('filament.hooks.db-notice'),
            )
            ->renderHook(
                'panels::user-menu.before',
                fn(): View => view('filament.hooks.lang-switcher'),
            )
            ->renderHook(
                'panels::footer',
                fn(): View => view('filament.hooks.footer'),
            )

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
                VersionsWidget::class,
                OverlookWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
