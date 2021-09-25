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

Route::middleware(['locale'])->group(function() {
    Route::get('/',                     [Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/stock',                [Controllers\StockController::class, 'index'])->name('app.stock');
    Route::get('/locale/{code}',        [Controllers\LocaleController::class, 'handleLocaleChange'])->name('app.locale');
    Route::get('/portfolio',            [Controllers\PortfolioController::class, 'index'])->name('app.portfolio');

    // Contact
    Route::get('/contact',              [Controllers\ContactController::class, 'create'])->name('app.contact.create');
    Route::post('/contact',             [Controllers\ContactController::class, 'index'])->name('app.contact.store');
});
