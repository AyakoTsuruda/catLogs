<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

/**
 * 管理者メニュー
 */
Route::namespace('administrator')
    ->prefix('administrator')
    ->as('administrator.')
    ->middleware('auth')
    ->group(base_path('routes/administrator.php'));

/**
 * メンバーメニュー
 */
Route::namespace('member')
    ->prefix('member')
    ->as('member.')
    ->middleware('auth')
    ->group(base_path('routes/member.php'));

/**
 * ユーザーメニュー
 */
Route::namespace('user')
    ->as('.user.')
    ->name('user')
    ->group(base_path('routes/user.php'));
