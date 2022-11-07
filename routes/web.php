<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\AddAlumniController;
use App\Http\Controllers\DashboardAdminController;

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


Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', function () {
        return view('alumni.home');
    });

    // Route::get('/profile', 'ProfileController@index')->name('profile');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::controller(AddAlumniController::class)->group(function () {
        Route::get('/addalumni', 'index')->name('addalumni');
        Route::post('/storeaddalumni', 'store')->name('storeaddalumni');
        Route::get('/admin/manajemenalumni', 'indexsemuaalumni')->name('manajemen_alumni');
    });

    Route::controller(DashboardAdminController::class)->group(function () {
        Route::get('/dashboardadminindex', 'index')->name('dashboardadminindex');
    });


    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::put('/profile', 'update')->name('profile.update');
    });

    Route::get('/formulir', [FormulirController::class, 'index'])->name('formulir');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('/admin/manajemenalumni', function () {
    //     return view('admin.manajemen_alumni');
    // })->name('manajemen_alumni');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});





require __DIR__ . '/auth.php';