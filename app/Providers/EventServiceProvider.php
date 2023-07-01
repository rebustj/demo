<?php

namespace App\Providers;

use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->listen['tiptap::setBoltContent'] = [
            function (TiptapEditor $component, string $statePath, array $linkProps): void {
                if ($component->isDisabled() || $statePath !== $component->getStatePath()) {
                    return;
                }

                $livewire = $component->getLivewire();
                data_set($livewire, 'linkProps', $linkProps);
                $livewire->mountFormComponentAction($statePath, 'filament_tiptap_bolt');
            },
        ];
    }
}
