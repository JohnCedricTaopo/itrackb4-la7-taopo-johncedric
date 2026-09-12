<?php

use App\Http\Controllers\GenshinImpactController;
use Illuminate\Support\Facades\Route;


Route::get('/whoami', function () {
    return 'John Cedric P. Taopo | 2023-70351 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/characters/featured', [GenshinImpactController::class, 'featured'])
    ->name('characters.featured');

Route::get('/characters/filter/{element?}', [GenshinImpactController::class, 'filter'])
    ->name('characters.filter');

Route::resource('characters', GenshinImpactController::class)
    ->only(['index', 'show'])
    ->whereNumber('character');