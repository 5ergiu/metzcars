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
    Route::get('/',                   [Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/locale/{code}',      [Controllers\LocaleController::class, 'handleLocaleChange'])->name('locale');

    // Contacts
    Route::get('/contacts',           [Controllers\ContactsController::class, 'index'])->name('contacts.index');
    Route::post('/contact',           [Controllers\ContactsController::class, 'store'])->name('contacts.store');
    Route::get('/contact/create',     [Controllers\ContactsController::class, 'create'])->name('contacts.create');

    // Stock
    Route::get('/stock',              [Controllers\StockController::class, 'index'])->name('stock.index');

    // Portfolio
    Route::post('/portfolio/upload',   [Controllers\PortfolioController::class, 'upload']);
    Route::resource('/portfolio', Controllers\PortfolioController::class)->parameter('portfolio', 'advert');
});

# Autovit routes
Route::get('/autovit/{brand}/models',              [Controllers\AutovitController::class, 'getBrandModels']);
Route::get('/autovit/{brand}/{model}/generations', [Controllers\AutovitController::class, 'getModelGenerations']);
