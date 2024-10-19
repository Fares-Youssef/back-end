<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaterController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('user', UserController::class);
    Route::resource('cities', CityController::class);
    Route::resource('details', DetailController::class);
    Route::resource('time', TimeController::class);
    Route::resource('types', TypeController::class);
    Route::resource('contracts', ContractController::class);
    Route::post('contracts/search',[ContractController::class , 'search'])->name('contracts.search');
    Route::get('contracts/next/{id}',[ContractController::class , 'next'])->name('contracts.next');
    Route::get('contracts/previous/{id}',[ContractController::class , 'previous'])->name('contracts.previous');
    Route::get('contracts-create-due/{id}',[ContractController::class , 'createDue'])->name('contracts.create-due');
    Route::post('contracts-storeDue/{id}',[ContractController::class , 'storeDue'])->name('contracts.storeDue');
    Route::post('contracts/due/{id}',[ContractController::class , 'due'])->name('contracts.due');
    Route::post('contracts/electric/{id}',[ContractController::class , 'electric'])->name('contracts.electric');
    Route::post('contracts/water/{id}',[ContractController::class , 'water'])->name('contracts.water');
    Route::get('download/{id}/{type}',[PDFController::class , 'download'])->name('download');
    Route::resource('due',DueController::class);
    Route::post('due/search',[DueController::class , 'search'])->name('due.search');
    Route::resource('electric',ElectricController::class);
    Route::resource('waters',WaterController::class);

    Route::get('test',[HomeController::class, 'test']);
});
