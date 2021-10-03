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
    Route::get('/',                   [Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/locale/{code}',      [Controllers\LocaleController::class, 'handleLocaleChange'])->name('app.locale');

    // Contacts
    Route::get('/contact/create',     [Controllers\ContactsController::class, 'create'])->name('app.contacts.create');
    Route::post('/contact',           [Controllers\ContactsController::class, 'store'])->name('app.contacts.store');

    // Stock
    Route::get('/stock',              [Controllers\StockController::class, 'index'])->name('app.stock.index');

    // Portfolio
    Route::get('/portfolio',          [Controllers\PortfolioController::class, 'index'])->name('app.portfolio.index');
    Route::get('/portfolio/{advert}', [Controllers\PortfolioController::class, 'show'])->name('app.portfolio.show');
});

# Admin routes
Route::prefix('admin')->middleware(['auth', 'locale'])->group(function() {
    Route::get('/contact',          [Controllers\ContactsController::class, 'index'])->name('admin.contacts.index');
    Route::get('/portfolio/create', [Controllers\PortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('/portfolio',       [Controllers\PortfolioController::class, 'store'])->name('admin.portfolio.store');
});

# Autovit routes
Route::get('/autovit/{brand}/models', [Controllers\AutovitController::class, 'getBrandModels']);
