<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('cloth')->group(function () {
        Route::get('create', [App\Http\Controllers\ClothController::class, 'create'])->name('cloth.create');
        Route::post('store', [App\Http\Controllers\ClothController::class, 'store'])->name('cloth.store');
        Route::get('', [App\Http\Controllers\ClothController::class, 'index'])->name('cloth.index');
        Route::get('destroy/{id}', [App\Http\Controllers\ClothController::class, 'destroy'])->name('cloth.destroy');
        Route::get('toShow', [App\Http\Controllers\ClothController::class, 'toShow'])->name('cloth.toShow');
        Route::get('show', [App\Http\Controllers\ClothController::class, 'show'])->name('cloth.show');
        Route::get('search', [App\Http\Controllers\ClothController::class, 'search'])->name('cloth.search');
    });
    Route::prefix('client')->group(function () {
        Route::get('create', [App\Http\Controllers\ClientsController::class, 'create'])->name('client.create');
        Route::post('store', [App\Http\Controllers\ClientsController::class, 'store'])->name('client.store');
        Route::get('destroy/{id}', [App\Http\Controllers\ClientsController::class, 'destroy'])->name('client.destroy');
        Route::get('', [App\Http\Controllers\ClientsController::class, 'index'])->name('client.index');
    });
    Route::prefix('cut')->group(function () {
        Route::get('create', [App\Http\Controllers\CutController::class, 'create'])->name('cut.create');
        Route::post('store', [App\Http\Controllers\CutController::class, 'store'])->name('cut.store');
        Route::get('toCreate', [App\Http\Controllers\CutController::class, 'toCreate'])->name('cut.toCreate');
        Route::get('search', [App\Http\Controllers\CutController::class, 'search'])->name('cut.search');
        Route::get('destroy/{id}', [App\Http\Controllers\CutController::class, 'destroy'])->name('cut.destroy');
        Route::get('', [App\Http\Controllers\CutController::class, 'index'])->name('cut.index');
    });
    Route::prefix('give')->group(function(){
        Route::get('',[App\Http\Controllers\GiveController::class, 'index'])->name('give.index');
        Route::get('show/{id}',[App\Http\Controllers\GiveController::class, 'show'])->name('give.show');
        Route::get('toCreate',[App\Http\Controllers\GiveController::class, 'toCreate'])->name('give.toCreate');
        Route::get('create',[App\Http\Controllers\GiveController::class, 'create'])->name('give.create');
        Route::get('Search',[App\Http\Controllers\GiveController::class, 'Search'])->name('give.Search');
        Route::post('store',[App\Http\Controllers\GiveController::class, 'store'])->name('give.store');
        Route::post('delete',[App\Http\Controllers\GiveController::class, 'delete'])->name('give.delete');
    });
    Route::prefix('account')->group(function(){
        Route::get('create',[App\Http\Controllers\AccountController::class, 'create'])->name('account.create');
        Route::post('store',[App\Http\Controllers\AccountController::class, 'store'])->name('account.store');
        Route::get('',[App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
        Route::get('show',[App\Http\Controllers\AccountController::class, 'show'])->name('account.show');
        Route::get('destroy/{id}',[App\Http\Controllers\AccountController::class, 'destroy'])->name('account.destroy');
    });
});
