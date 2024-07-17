<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminControllerr;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\IconController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [AdminControllerr::class, 'index'])->name('login');
Route::get('/logout', [AdminControllerr::class, 'logout'])->name('logout');
Route::get('/admin/register', [AdminControllerr::class, 'register'])->name('register');


// PROTECTED
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminControllerr::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/profiles', [AdminControllerr::class, 'profiles'])->name('profiles');

    // Route::get('/admin/{description}', [AdminControllerr::class, 'profiles'])->name('description');
    // Route::get('/admin/users', [AdminControllerr::class, 'users'])->name('users');

    // CONTENT

    Route::resource('/admin/AddContent', ContentController::class);
    Route::resource('/admin/users', UsersController::class);
    
});


// POST REQUEST ROUTE

Route::post('/admin/registerPost', [AdminControllerr::class, 'registerPost'])->name('registerPost');

Route::post('/admin/loginPost', [AdminControllerr::class, 'loginPost'])->name('loginPost');