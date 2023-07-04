<?php

use LaraZeus\Bolt\Filament\Resources\CategoryResource;
use LaraZeus\Bolt\Filament\Resources\CollectionResource;
use LaraZeus\Bolt\Filament\Resources\FormResource;
use LaraZeus\Bolt\Filament\Resources\FormResource\Pages\ListForms;
use LaraZeus\Bolt\Filament\Resources\ResponseResource;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

it('can not edit', function () {
    get(\LaraZeus\Bolt\Filament\Resources\CategoryResource::getUrl('edit', [
        'record' => \LaraZeus\Bolt\Models\Category::factory()->create(),
    ]))->assertSuccessful();
});
