<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ABoutController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\NewsletterController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProjectCatController;
use App\Http\Controllers\Backend\ProjectController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Web Routes For Backend
|--------------------------------------------------------------------------
|
| Below are all of the database connections defined for your application.
| An example configuration is provided for each database system which
| is supported by Laravel. You're free to add / remove connections.
|
*/


Route::group(['prefix' => '/admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //___  slider Done  ___//
     Route::group(['prefix' => '/slider'], function () {
         Route::get('/manage', [SliderController::class, 'manage'])->name('slider.manage');
         Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
         Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
         Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
     });

   //___  about Done  ___//
    Route::group(['prefix' => '/about'], function () {
        Route::get('/manage', [ABoutController::class, 'manage'])->name('about.manage');
        Route::post('/store', [ABoutController::class, 'store'])->name('about.store');
        Route::post('/update/{id}', [ABoutController::class, 'update'])->name('about.update');
    });

    //___  team Done  ___//
    Route::group(['prefix' => '/team'], function () {
        Route::get('/manage', [TeamController::class, 'manage'])->name('team.manage');
        Route::post('/store', [TeamController::class, 'store'])->name('team.store');
        Route::post('/update/{id}', [TeamController::class, 'update'])->name('team.update');
        Route::get('/delete/{id}', [TeamController::class, 'destroy'])->name('team.delete');
    });

    //___  newsletter Done  ___//
    Route::group(['prefix' => '/newsletter'], function () {
        Route::get('/manage', [NewsletterController::class, 'manage'])->name('newsletter.manage');
        Route::post('/store', [NewsletterController::class, 'store'])->name('newsletter.store');
        Route::post('/update/{id}', [NewsletterController::class, 'update'])->name('newsletter.update');
    });

    //___  service Done ___//
    Route::group(['prefix' => '/service'], function () {
        Route::get('/manage', [ServiceController::class, 'manage'])->name('service.manage');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
    });

    //___  testimonial Done  ___//
    Route::group(['prefix' => '/testimonial'], function () {
        Route::get('/manage', [TestimonialController::class, 'manage'])->name('testimonial.manage');
        Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::get('/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');
    });

    //___  project-category Done ___//
    Route::group(['prefix' => '/project-category'], function () {
        Route::get('/manage', [ProjectCatController::class, 'manage'])->name('project_cat.manage');
        Route::post('/store', [ProjectCatController::class, 'store'])->name('project_cat.store');
        Route::post('/update/{id}', [ProjectCatController::class, 'update'])->name('project_cat.update');
        Route::get('/delete/{id}', [ProjectCatController::class, 'destroy'])->name('project_cat.delete');
    });

    //___  project Done  ___//
    Route::group(['prefix' => '/project'], function () {
        Route::get('/manage', [ProjectController::class, 'manage'])->name('project.manage');
        Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');
    });

    //___  setting Done  ___//
    Route::group(['prefix' => '/setting'], function () {
        Route::get('/manage', [SettingController::class, 'manage'])->name('setting.manage');
        Route::post('/store', [SettingController::class, 'store'])->name('setting.store');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('setting.update');
    });


});



/*
|--------------------------------------------------------------------------
| Web Routes For Frontend
|--------------------------------------------------------------------------
|
| Below are all of the database connections defined for your application.
| An example configuration is provided for each database system which
| is supported by Laravel. You're free to add / remove connections.
|
*/
use App\Http\Controllers\Frontend\FrontendController;


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/project', [FrontendController::class, 'project'])->name('project');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/team', [FrontendController::class, 'team'])->name('team');
Route::get('/testimonial', [FrontendController::class, 'testimonial'])->name('testimonial');






