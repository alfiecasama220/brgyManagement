<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminControllerr;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\OfficialsController;
use App\Http\Controllers\NonVoterController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\BlotterController;
use App\Http\Controllers\ClientAdminController;
use App\Http\Controllers\AdminCertificateController;
use App\Http\Controllers\AdminBlottterController;

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
    Route::patch('/admin/profiles/upload/{id}', [UsersController::class, 'profilesImage'])->name('profilesImage');

    // Route::get('/admin/{description}', [AdminControllerr::class, 'profiles'])->name('description');
    // Route::get('/admin/users', [AdminControllerr::class, 'users'])->name('users');

    // CONTENT

    Route::resource('/admin/AddContent', ContentController::class);
    Route::resource('/admin/AddContent/AddPopulation', ContentController::class);
    Route::resource('/admin/users', UsersController::class);
    Route::get('/admin/clients', [UsersController::class, 'clients'])->name('adminClients');
    // Route::get('/admin/clients', [ClientAdminController::class, 'clients'])->name('adminClients');

    // ACCEPTED AND REJECTED

    // Route::resource('/admin/accepted', UsersController::class);
    Route::patch('/admin/user/accepted/{id}', [UsersController::class, 'accepted'])->name('accepted');
    Route::patch('/admin/user/rejected/{id}', [UsersController::class, 'rejected'])->name('rejected');


    // POPULATIONS
    Route::resource('/admin/populations', PopulationController::class);

    // VOTERS
    Route::resource('/admin/voters', VoterController::class);
    
    // NON-VOTERS
    Route::resource('/admin/non-voters', NonVoterController::class);

    // ANNOUNCEMENT
    Route::resource('/admin/announcement', AnnouncementController::class);

    // OFFICIALS
    Route::resource('/admin/officials', OfficialsController::class);

    // ADD AND DELETE POSITION
    // Route::get('/admin/officials/positions', [OfficialsController::class, 'positions'])->name('positions');
    Route::post('/admin/officials/AddPosition', [OfficialsController::class, 'storePosition'])->name('addPosition');
    Route::delete('/admin/officials/DeletePosition/{id}', [OfficialsController::class, 'deletePosition'])->name('deletePosition');

    // CERTIFICATES
    Route::get('/admin/certificates', [AdminCertificateController::class, 'index'])->name('certificates');
    Route::delete('/admin/certificatesDelete/{id}', [AdminCertificateController::class, 'certificatesDelete'])->name('certificatesDelete');

    // BLOTTER
    Route::get('/admin/blotter', [AdminBlottterController::class, 'index'])->name('blotter');
    
});

// CLIENT SIDE
Route::get('/', [ClientController::class, 'index'])->name('home');  
Route::get('/about', [ClientController::class, 'about'])->name('about');  

// CLIENT LOGIN
Route::get('/register', [ClientAuthController::class, 'register'])->name('registerClient');  

Route::get('/login', [ClientAuthController::class, 'login'])->name('loginClient');  
Route::get('/logoutClient', [ClientAuthController::class, 'clientLogout'])->name('logoutClient');  
// CLIENT POST REQUEST
Route::post('/registerPost', [ClientAuthController::class, 'registerPost'])->name('registerClientPost');  
Route::post('/loginPost', [ClientAuthController::class, 'loginPost'])->name('loginClientPost'); 

Route::middleware('is_client')->group(function () {  
    Route::resource('/request/certificates', CertificateController::class);
    Route::resource('/request/blotter', BlotterController::class);

    Route::get('/notify-user', function () {

    });
});

// POST REQUEST ROUTE

Route::post('/admin/registerPost', [AdminControllerr::class, 'registerPost'])->name('registerPost');

Route::post('/admin/loginPost', [AdminControllerr::class, 'loginPost'])->name('loginPost');


// EMAIL HANDLING ROUTE

// route::get('/activation', function () {
//     view('')
// });