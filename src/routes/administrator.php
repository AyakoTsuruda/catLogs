<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * 管理者機能のルーティング
 */

// アカウント管理
Route::prefix('account')
    ->as('account.')
    //->middleware('administrator')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Administrator\AccountController::class, 'index'])
            ->name('index');
    });

