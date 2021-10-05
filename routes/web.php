<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryGroupController;

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

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('panel/admin')->group(function () {
    Route::resource('setting', SettingController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('category-group', CategoryGroupController::class);
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});