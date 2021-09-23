<?php

use App\Http\Controllers;
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

# Public routes
Route::middleware(['locale'])->group(function() {
    Route::get('/',              [Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/locale/{code}', [Controllers\LocaleController::class, 'handleLocaleChange'])->name('locale');
});
