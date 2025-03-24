<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminController;




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



Route::get('/', function () {
return view('public_site.layouts.homepage');
});

Route::get('/about', function () {
    return view('public_site.layouts.aboutpage');
    });
    
    Route::get('/ourroom', function () {
        return view('public_site.layouts.roompage');
        });

        Route::get('/gallery', function () {
            return view('public_site.layouts.gallerypage');
            });

            Route::get('/blog', function () {
                return view('public_site.layouts.blogpage');
                });

                Route::get('/contact', function () {
                    return view('public_site.layouts.contactpage');
                    });


                    // Route::get('/dash', function () {
                    //     return view('dashborde.layouts.dashbord');
                    // });

                    Route::get('/dash', [AdminController::class, 'dashboard'])->name('dashboard');

                    Route::resource('users', UsersController::class);

                    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');




                    // Route::prefix('/admin')->group(function () {
                    //     Route::resource('profile', AdminProfileController::class)->only(['edit', 'update']);
                    // });


Route::resource('admins', AdminController::class);

Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

