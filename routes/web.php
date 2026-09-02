<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenshinImpactController;



Route::get('/whoami', function () {
    return 'John Cedric P. Taopo | 2023-70351 | Block 4C | ITRACKB4 Laravel 12';
});

//Specific routes are placed before the dynamic id route.
Route::get('/characters', [GenshinImpactController::class, 'index'])->name('characters.index');

Route::get('/characters/featured', [GenshinImpactController::class, 'featured']) ->name('characters.featured');

Route::get('/characters/filter/{element?}', [GenshinImpactController::class, 'filter']) ->name('characters.filter');

Route::get('/characters/{id}', [GenshinImpactController::class, 'show']) ->whereNumber('id') ->name('characters.show');
