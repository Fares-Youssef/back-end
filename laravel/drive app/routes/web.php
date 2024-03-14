<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DriveController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//=================
// drive's routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('drive')->group(function () {
        //list page
        Route::get('index', [DriveController::class, 'index'])->name('drive.index');
        //public page
        Route::get('public', [DriveController::class, 'public'])->name('drive.public');
        //create page
        Route::get('create', [DriveController::class, 'create'])->name('drive.create');
        //save data in db
        Route::post('store', [DriveController::class, 'store'])->name('drive.store');
        // show file
        Route::get('show/{id}', [DriveController::class, 'show'])->name('drive.show');
        // download file
        Route::get('download/{id}', [DriveController::class, 'download'])->name('drive.download');
        // edit file
        Route::get('edit/{id}', [DriveController::class, 'edit'])->name('drive.edit');
        // destroy file
        Route::get('destroy/{id}', [DriveController::class, 'destroy'])->name('drive.destroy');
        // update file
        Route::post('update/{id}', [DriveController::class, 'update'])->name('drive.update');
        // change file status
        Route::get('status/{id}', [DriveController::class, 'status'])->name('drive.status');
    });
});
