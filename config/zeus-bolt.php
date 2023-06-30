<?php

return [
    /**
     * set the default path for the forms' homepage.
     */
    'path' => 'bolt',

    /**
     * the middleware you want to apply on all the forms routes
     * for example if you want to make your form for users only, add the middleware 'auth'.
     */
    'middleware' => ['web'],

    /**
     * customize the models
     */
    'models' => [
        'Category' => \LaraZeus\Bolt\Models\Category::class,
        'Collection' => \LaraZeus\Bolt\Models\Collection::class,
        'Field' => \LaraZeus\Bolt\Models\Field::class,
        'FieldResponse' => \LaraZeus\Bolt\Models\FieldResponse::class,
        'Form' => \LaraZeus\Bolt\Models\Form::class,
        'FormsStatus' => \LaraZeus\Bolt\Models\FormsStatus::class,
        'Response' => \LaraZeus\Bolt\Models\Response::class,
        'Section' => \LaraZeus\Bolt\Models\Section::class,
    ],

    /**
     * this will be setup the default seo site title. read more about it in 'laravel-seo'.
     */
    'site_title' => config('app.name', 'Laravel').' | Forms',

    /**
     * this will be setup the default seo site description. read more about it in 'laravel-seo'.
     */
    'site_description' => 'All about '.config('app.name', 'Laravel').' Forms',

    /**
     * this will be setup the default seo site color theme. read more about it in 'laravel-seo'.
     */
    'site_color' => '#F5F5F4',

    'uploads' => [
        'disk' => 'public',
        'directory' => 'logos',
    ],

    /**
     * available locales, this currently used only in tags manager.
     */
    'translatable_Locales' => ['en', 'ar'],

    /**
     * Navigation Group Label
     */
    'navigation_group_label' => 'Bolt',

    /**
     * default mailable for new entries
     */
    'default_mailable' => \LaraZeus\Bolt\Mail\FormSubmission::class,

    /**
     * the default date format
     */
    'default_date_format' => 'Y m/d',

    /**
     * available extensions, leave it null to disable the extensions tab from the forms
     */
    'extensions' => [
        \LaraZeus\Thunder\Extensions\Thunder::class,
    ],
];
