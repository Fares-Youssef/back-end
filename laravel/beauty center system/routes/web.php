<?php

use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('receipt')->group(function () {
    Route::get('', [App\Http\Controllers\ReceiptController::class, 'index'])->name('receipt.index');
    Route::get('search', [App\Http\Controllers\ReceiptController::class, 'search'])->name('receipt.search');
    Route::get('create', [App\Http\Controllers\ReceiptController::class, 'create'])->name('receipt.create');
    Route::get('show', [App\Http\Controllers\ReceiptController::class, 'show'])->name('receipt.show');
    Route::get('store', [App\Http\Controllers\ReceiptController::class, 'store'])->name('receipt.store');
    Route::get('print', [App\Http\Controllers\ReceiptController::class, 'print'])->name('print');
    Route::get('destroy/{id}', [App\Http\Controllers\ReceiptController::class, 'destroy'])->name('receipt.destroy');

});
Route::prefix('product')->group(function () {
    Route::get('', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
});
Route::prefix('employee')->group(function () {
    Route::get('', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    Route::get('store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
    Route::get('drawStore', [App\Http\Controllers\EmployeeController::class, 'drawStore'])->name('employee.drawStore');
    Route::get('advanceStore', [App\Http\Controllers\EmployeeController::class, 'advanceStore'])->name('employee.advanceStore');
    Route::get('draw', [App\Http\Controllers\EmployeeController::class, 'draw'])->name('employee.draw');
    Route::get('in', [App\Http\Controllers\EmployeeController::class, 'in'])->name('employee.in');
    Route::get('out', [App\Http\Controllers\EmployeeController::class, 'out'])->name('employee.out');
    Route::get('advance', [App\Http\Controllers\EmployeeController::class, 'advance'])->name('employee.advance');
    Route::get('totalAdvance', [App\Http\Controllers\EmployeeController::class, 'totalAdvance'])->name('employee.totalAdvance');
    Route::get('totalDraw', [App\Http\Controllers\EmployeeController::class, 'totalDraw'])->name('employee.totalDraw');
    Route::get('destroy/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('destroyAdvance/{id}', [App\Http\Controllers\EmployeeController::class, 'destroyAdvance'])->name('employee.destroyAdvance');
    Route::get('destroyDraw/{id}', [App\Http\Controllers\EmployeeController::class, 'destroyDraw'])->name('employee.destroyDraw');

});
Route::prefix('account')->group(function () {
    Route::get('', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
    Route::get('create', [App\Http\Controllers\AccountController::class, 'create'])->name('account.create');
    // Route::get('show', [App\Http\Controllers\EmployeeController::class, 'show'])->name('account.show');
    // Route::get('draw', [App\Http\Controllers\EmployeeController::class, 'draw'])->name('employee.draw');
    // Route::get('advance', [App\Http\Controllers\EmployeeController::class, 'advance'])->name('employee.advance');
    // Route::get('total', [App\Http\Controllers\EmployeeController::class, 'total'])->name('employee.total');
});
Route::prefix('shop')->group(function(){
    Route::get('',[App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
    Route::get('destroy/{id}', [App\Http\Controllers\ShopController::class, 'destroy'])->name('shop.destroy');

});
Route::prefix('client')->group(function(){
    Route::get('',[\App\Http\Controllers\ClientController::class, "index"])->name('client.index');
    Route::get('store',[App\Http\Controllers\ClientController::class, 'store'])->name('client.store');
    Route::get('destroy/{id}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client.destroy');

});
Route::prefix('in')->group(function(){
    Route::get('',[\App\Http\Controllers\InController::class, "index"])->name('in.index');
    Route::get('store',[App\Http\Controllers\InController::class, 'store'])->name('in.store');
    Route::get('destroy/{id}', [App\Http\Controllers\InController::class, 'destroy'])->name('in.destroy');

});
Route::prefix('out')->group(function(){
    Route::get('',[\App\Http\Controllers\OutController::class, "index"])->name('out.index');
    Route::get('store',[App\Http\Controllers\OutController::class, 'store'])->name('out.store');
    Route::get('destroy/{id}', [App\Http\Controllers\OutController::class, 'destroy'])->name('out.destroy');
});

Auth::routes();

