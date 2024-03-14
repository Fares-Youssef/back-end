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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('contracts/create', [App\Http\Controllers\ContractController::class, 'create'])->name('contract.create');


Route::middleware(['auth'])->group(function () {
    Route::prefix('contracts')->group(function () {
        Route::get('', [App\Http\Controllers\ContractController::class, 'index'])->name('contract.index');
        Route::get('create', [App\Http\Controllers\ContractController::class, 'create'])->name('contract.create');
        Route::post('store', [App\Http\Controllers\ContractController::class, 'store'])->name('contract.store');
        Route::get('show/{id}', [App\Http\Controllers\ContractController::class, 'show'])->name('contract.show');
        Route::get('download/{id}', [App\Http\Controllers\ContractController::class, 'download'])->name('contract.download');
        Route::get('downloadTwo/{id}', [App\Http\Controllers\ContractController::class, 'downloadTwo'])->name('contract.downloadTwo');
        Route::get('destroy/{id}', [App\Http\Controllers\ContractController::class, 'destroy'])->name('contract.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\ContractController::class, 'edit'])->name('contract.edit');
        Route::post('update/{id}', [App\Http\Controllers\ContractController::class, 'update'])->name('contract.update');
        Route::get('createDue/{buildingNum}', [App\Http\Controllers\ContractController::class, 'createDue'])->name('contract.createDue');
        Route::post('storeDue', [App\Http\Controllers\ContractController::class, 'storeDue'])->name('contract.storeDue');
        Route::get('search', [App\Http\Controllers\ContractController::class, 'search'])->name('contract.search');
    });
    Route::prefix('city')->group(function () {
        Route::get('store', [App\Http\Controllers\CityController::class, 'store'])->name('city.store');
        Route::get('destroy/{id}', [App\Http\Controllers\CityController::class, 'destroy'])->name('city.destroy');
    });
    Route::prefix('time')->group(function () {
        Route::get('store', [App\Http\Controllers\TimeController::class, 'store'])->name('time.store');
        Route::get('destroy/{id}', [App\Http\Controllers\TimeController::class, 'destroy'])->name('time.destroy');
    });
    Route::prefix('type')->group(function () {
        Route::get('store', [App\Http\Controllers\TypeController::class, 'store'])->name('type.store');
        Route::get('destroy/{id}', [App\Http\Controllers\TypeController::class, 'destroy'])->name('type.destroy');
    });
    Route::prefix('detail')->group(function () {
        Route::get('store', [App\Http\Controllers\DetailController::class, 'store'])->name('detail.store');
        Route::get('destroy/{id}', [App\Http\Controllers\DetailController::class, 'destroy'])->name('detail.destroy');
    });
    Route::prefix('setting')->group(function () {
        Route::get('city', [App\Http\Controllers\CityController::class, 'index'])->name('setting.city');
        Route::get('time', [App\Http\Controllers\TimeController::class, 'index'])->name('setting.time');
        Route::get('detail', [App\Http\Controllers\DetailController::class, 'index'])->name('setting.detail');
        Route::get('type', [App\Http\Controllers\TypeController::class, 'index'])->name('setting.type');
    });
    Route::prefix('due')->group(function () {
        Route::get('create', [App\Http\Controllers\DueController::class, 'create'])->name('due.create');
        Route::post('store', [App\Http\Controllers\DueController::class, 'store'])->name('due.store');
        Route::post('newStore', [App\Http\Controllers\DueController::class, 'newStore'])->name('due.newStore');
        Route::get('', [App\Http\Controllers\DueController::class, 'index'])->name('due.index');
        Route::get('show', [App\Http\Controllers\DueController::class, 'show'])->name('due.show');
        Route::get('edit/{id}', [App\Http\Controllers\DueController::class, 'edit'])->name('due.edit');
        Route::post('update/{id}', [App\Http\Controllers\DueController::class, 'update'])->name('due.update');
        Route::get('destroy/{id}', [App\Http\Controllers\DueController::class, 'destroy'])->name('due.destroy');
        Route::get('download/{id}', [App\Http\Controllers\DueController::class, 'download'])->name('due.download');
        Route::get('search', [App\Http\Controllers\DueController::class, 'search'])->name('due.search');
        Route::get('export', [App\Http\Controllers\DueController::class, 'export'])->name('due.export');
    });
    Route::prefix('water')->group(function () {
        Route::get('create', [App\Http\Controllers\WaterController::class, 'create'])->name('water.create');
        Route::post('store', [App\Http\Controllers\WaterController::class, 'store'])->name('water.store');
        Route::get('', [App\Http\Controllers\WaterController::class, 'index'])->name('water.index');
        Route::get('destroy/{id}', [App\Http\Controllers\WaterController::class, 'destroy'])->name('water.destroy');
        Route::get('download/{id}', [App\Http\Controllers\WaterController::class, 'download'])->name('water.download');
        Route::get('search', [App\Http\Controllers\WaterController::class, 'search'])->name('water.search');
    });
    Route::prefix('electric')->group(function () {
        Route::get('create', [App\Http\Controllers\ElecticController::class, 'create'])->name('electric.create');
        Route::post('store', [App\Http\Controllers\ElecticController::class, 'store'])->name('electric.store');
        Route::get('', [App\Http\Controllers\ElecticController::class, 'index'])->name('electric.index');
        Route::get('destroy/{id}', [App\Http\Controllers\ElecticController::class, 'destroy'])->name('electric.destroy');
        Route::get('download/{id}', [App\Http\Controllers\ElecticController::class, 'download'])->name('electric.download');
        Route::get('search', [App\Http\Controllers\ElecticController::class, 'search'])->name('electric.search');
    });
});

