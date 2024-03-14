<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // delete user
    Route::get("destroy/{id}", [App\Http\Controllers\Auth\RegisterController::class, "destroy"])->name("user.destroy");

    // home raoute
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // city route
    Route::prefix('city')->group(function () {
        Route::post('store', [App\Http\Controllers\CityController::class, 'store'])->name('city.store');
        Route::get('destroy/{id}', [App\Http\Controllers\CityController::class, 'destroy'])->name('city.destroy');
    });

    // location routes
    Route::prefix('location')->group(function () {
        Route::post('store', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');
        Route::get('destroy/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('location.destroy');
    });

    //data route
    Route::prefix('data')->group(function () {
        Route::get('', [App\Http\Controllers\DataController::class, 'index'])->name('data.index');
        Route::post('date', [App\Http\Controllers\DateController::class, 'update'])->name('date.update');
        Route::post('import', [App\Http\Controllers\DataController::class, 'import'])->name('data.import');
        Route::get('importView', [App\Http\Controllers\DataController::class, 'importView'])->name('data.importView');
        Route::get('create', [App\Http\Controllers\DataController::class, 'create'])->name('data.create');
        Route::get('edit/{id}', [App\Http\Controllers\DataController::class, 'edit'])->name('data.edit');
        Route::get('destroy/{id}', [App\Http\Controllers\DataController::class, 'destroy'])->name('data.destroy');
        Route::post('store', [App\Http\Controllers\DataController::class, 'store'])->name('data.store');
        Route::post('search', [App\Http\Controllers\DataController::class, 'search'])->name('data.search');
        Route::post('update/{id}', [App\Http\Controllers\DataController::class, 'update'])->name('data.update');
    });

    //sub routes
    Route::prefix('sub')->group(function () {
        Route::get('export', [App\Http\Controllers\SubscriptionController::class, 'export'])->name('sub.export');
        Route::get('toCreate', [App\Http\Controllers\SubscriptionController::class, 'toCreate'])->name('sub.toCreate');
        Route::get('create', [App\Http\Controllers\SubscriptionController::class, 'create'])->name('sub.create');
        Route::get('', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('sub.index');
        Route::get('toHome', [App\Http\Controllers\SubscriptionController::class, 'toHome'])->name('sub.toHome');
        Route::post('home', [App\Http\Controllers\SubscriptionController::class, 'home'])->name('sub.home');
        Route::get('destroy/{id}', [App\Http\Controllers\SubscriptionController::class, 'destroy'])->name('sub.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\SubscriptionController::class, 'edit'])->name('sub.edit');
        Route::post('store', [App\Http\Controllers\SubscriptionController::class, 'store'])->name('sub.store');
        Route::post('search', [App\Http\Controllers\SubscriptionController::class, 'search'])->name('sub.search');
        Route::post('update/{id}', [App\Http\Controllers\SubscriptionController::class, 'update'])->name('sub.update');
    });
});
