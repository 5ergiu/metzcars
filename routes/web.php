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

# Public & admin routes
Route::middleware(['locale'])->group(function() {
    Route::get('/',                                [Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/locale/{code}',                   [Controllers\LocaleController::class, 'handleLocaleChange'])->name('locale');

    // Contacts
    Route::get('/contacts',                        [Controllers\ContactsController::class, 'index'])->name('contacts.index');
    Route::post('/contact',                        [Controllers\ContactsController::class, 'store'])->name('contacts.store');
    Route::get('/contact/create',                  [Controllers\ContactsController::class, 'create'])->name('contacts.create');

    // Stock
    Route::get('/stock',                           [Controllers\StockController::class, 'index'])->name('stock.index');
    Route::post('/stock/toggle-sold/{advert}',     [Controllers\StockController::class, 'toggleSold'])->name('stock.sold');
    Route::post('/stock/toggle-special/{advert}',  [Controllers\StockController::class, 'toggleSpecial'])->name('stock.special');

    // Portfolio
    Route::post('/portfolio/upload',               [Controllers\PortfolioController::class, 'upload']);
    Route::resource('/portfolio',                  Controllers\PortfolioController::class)->parameter('portfolio', 'advert');

    // Registration Services
    Route::get('/registration-services',           [Controllers\RegistrationServicesController::class, 'index']);
});

# Autovit routes
Route::get('/autovit/{brand}/models',              [Controllers\AutovitController::class, 'getBrandModels']);
Route::post('/autovit/update-stock',               [Controllers\AutovitController::class, 'updateStock'])->name('autovit.updateStock');
