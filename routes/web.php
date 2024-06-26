<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['backend'])
    ->prefix('backend')
    ->name('backend.')
    ->namespace('Cpkm\Basic\Http\Controllers\Backend')->group(function(){
        Route::prefix('basic')
            ->name('basic.')
            ->group(function () {
                Route::middleware(['auth:backend', 'admin.permission'])->group(function () {
                    /* 幣別列表 */
                    Route::resource('currency', 'Basic\CurrencyController');
                });
            });
    });
