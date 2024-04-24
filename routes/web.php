<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ABoutController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Below are all of the database connections defined for your application.
| An example configuration is provided for each database system which
| is supported by Laravel. You're free to add / remove connections.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::group(['prefix' => '/about'], function () {
        Route::get('/manage', [ABoutController::class, 'manage'])->name('about.manage');
        // Route::get('/create', [ABoutController::class, 'create'])->name('about.create');
        // Route::post('/store', [ABoutController::class, 'store'])->name('about.store');
        // Route::get('/edit', [ABoutController::class, 'edit'])->name('about.edit');
        // Route::get('/update/{id}', [ABoutController::class, 'update'])->name('about.update');
        // Route::get('/delete/{id}', [ABoutController::class, 'delete'])->name('about.delete');
    });
});





