<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::redirect('/login', '/admin/login')->name('login');

Route::post('/forms', function () {
    // test callbacks for bolt
    $code = \Illuminate\Support\Str::random(4, 5);

    \Illuminate\Support\Facades\DB::table('logger')->insert([
        'form_id' => request('form_id'),
        'response' => request('response'),
        'code' => $code,
    ]);

    return response()->json([
        'message' => 'your code is '.$code,
        'state' => 'faild',
    ]);
});

Route::get('/up', function () {
    auth()->user()->addPoints(10);
    dump(auth()->user()->nextLevelAt());

    dd(\LevelUp\Experience\Facades\Leaderboard::generate()
        ->pluck('experience.experience_points','id')
    );
});

Route::view('embed', 'embed');

Route::get('lang/{lang}', function ($lang) {
    session()->put('current_lang', $lang);
    app()->setLocale($lang);

    return redirect()->back();
});

Route::get('theme/{theme}', function ($theme) {
    session()->put('current_theme', $theme);

    return redirect()->back();
});
