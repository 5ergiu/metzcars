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
    Route::get('/',                     [Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/stock',                [Controllers\StockController::class, 'index'])->name('app.stock');
    Route::get('/locale/{code}',        [Controllers\LocaleController::class, 'handleLocaleChange'])->name('app.locale');
    Route::get('/terms-and-conditions', [Controllers\LegalController::class, 'terms'])->name('app.legal.terms');
    Route::get('/privacy-policy',       [Controllers\LegalController::class, 'privacy'])->name('app.legal.privacy');
    Route::get('/contact',              [Controllers\ContactController::class, 'index'])->name('app.contact');
});
