<?php

use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::controller(ConsumerController::class)
    ->middleware(['auth', 'role:consumer'])
    ->prefix('consumer')
    ->group(function () {
        Route::get('/bills', 'bills_view')->name('consumer.bills_view');
        Route::put('/bills/{id}', 'update_bill')->name('consumer.update_bill');
    });

Route::controller(ProviderController::class)
    ->middleware(['auth', 'role:provider'])
    ->prefix('provider')
    ->group(function () {
        Route::get('/consumers', 'consumers_view')->name('provider.consumers_view');
        Route::get('/consumers/{id}', 'single_consumer_view')->name('provider.single_consumer_view');
        Route::get('/consumers/{id}/add-bill', 'add_bill_view')->name('provider.add_bill_view');
        Route::post('/consumers/{id}/add-bill', 'add_bill')->name('provider.add_bill');
    });