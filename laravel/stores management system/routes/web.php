<?php

use GuzzleHttp\Middleware;
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
    Route::get('/', function () {
        return view('home');
    });
    Route::get('user/destroy{id}' , [App\Http\Controllers\Auth\RegisterController::class , 'destroy'])->name('user.destroy');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // stores routes
    Route::prefix('store')->group(function () {
        Route::get('create', [App\Http\Controllers\StoreController::class, 'create'])->name('store.create');
        Route::post('store', [App\Http\Controllers\StoreController::class, 'store'])->name('store.store');
        Route::get('destroy/{id}', [App\Http\Controllers\StoreController::class, 'destroy'])->name('store.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\StoreController::class, 'edit'])->name('store.edit');
        Route::post('update/{id}', [App\Http\Controllers\StoreController::class, 'update'])->name('store.update');
    });

    // cabins routes
    Route::prefix('cabin')->group(function () {
        Route::get('create', [App\Http\Controllers\CabinController::class, 'create'])->name('cabin.create');
        Route::post('store', [App\Http\Controllers\CabinController::class, 'store'])->name('cabin.store');
        Route::get('destroy/{id}', [App\Http\Controllers\CabinController::class, 'destroy'])->name('cabin.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\CabinController::class, 'edit'])->name('cabin.edit');
        Route::post('update/{id}', [App\Http\Controllers\CabinController::class, 'update'])->name('cabin.update');
    });

    // products routes
    Route::prefix('product')->group(function () {
        Route::get('create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
        Route::post('store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
        Route::get('destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
        Route::post('update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    });

    // ins routes
    Route::prefix('in')->group(function () {
        Route::get('create', [App\Http\Controllers\InController::class, 'create'])->name('in.create');
        Route::post('store', [App\Http\Controllers\InController::class, 'store'])->name('in.store');
        Route::get('destroy/{id}', [App\Http\Controllers\InController::class, 'destroy'])->name('in.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\InController::class, 'edit'])->name('in.edit');
        Route::post('update/{id}', [App\Http\Controllers\InController::class, 'update'])->name('in.update');
    });

    // outs routes
    Route::prefix('out')->group(function () {
        Route::get('create', [App\Http\Controllers\OutController::class, 'create'])->name('out.create');
        Route::post('store', [App\Http\Controllers\OutController::class, 'store'])->name('out.store');
        Route::get('destroy/{id}', [App\Http\Controllers\OutController::class, 'destroy'])->name('out.destroy');
        Route::get('edit/{id}', [App\Http\Controllers\OutController::class, 'edit'])->name('out.edit');
        Route::post('update/{id}', [App\Http\Controllers\OutController::class, 'update'])->name('out.update');
    });

    //reports routes
    Route::prefix('report')->group(function(){
        Route::get('products' , [App\Http\Controllers\ReportController::class , 'products'])->name('report.products');
        Route::post('search' , [App\Http\Controllers\ReportController::class , 'productsSearch'])->name('report.productsSearch');
        Route::get('cabins' , [App\Http\Controllers\ReportController::class , 'cabins'])->name('report.cabins');
        Route::post('searchs' , [App\Http\Controllers\ReportController::class , 'cabinsSearch'])->name('report.cabinsSearch');
        Route::get('toIn' ,[App\Http\Controllers\ReportController::class , 'toIn'])->name('report.toIn');
        Route::post('in' ,[App\Http\Controllers\ReportController::class , 'in'])->name('report.in');
        Route::get('toOut' ,[App\Http\Controllers\ReportController::class , 'toOut'])->name('report.toOut');
        Route::post('out' ,[App\Http\Controllers\ReportController::class , 'out'])->name('report.out');
    });
});
