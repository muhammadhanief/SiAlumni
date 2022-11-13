<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\AddAlumniController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\VerifikasiAkunController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\HistoriPermohonanAlumniController;

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
Route::get('/landing', function () {
    return view('landingpage.home');
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

    Route::controller(VerifikasiAkunController::class)->group(function () {
        Route::get('/verifikasiindex', 'index')->name('verifikasiindex');
        Route::POST('/setujuiakun/{id}', 'setujuiakun');
        Route::POST('/tolakakun/{id}', 'tolakakun');
        Route::POST('/pendingakun/{id}', 'pendingakun');
        Route::get('/konfirmasi/{id}', 'verif')->name('konfirmasi');
        // Route::post('/storeaddalumni', 'store')->name('storeaddalumni');
        // Route::get('/admin/manajemenalumni', 'indexsemuaalumni')->name('manajemen_alumni');
    });

    Route::controller(FormulirController::class)->group(function () {
        Route::get('/formulir/ijazah', 'index')->name('formulir.ijazah');
        Route::get('/formulir/transkrip', 'indexTrans')->name('formulir.transkrip');
        Route::post('/formulir', 'store')->name('formulir.store');
    });


    // // daftar permohonan
    Route::controller(PermohonanController::class)->group(function () {
        Route::get('/permohonan', 'index')->name('permohonan');
    });

    Route::controller(DashboardAdminController::class)->group(function () {
        Route::get('/dashboardadminindex', 'index')->name('dashboardadminindex');
    });


    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::put('/profile', 'update')->name('profile.update');
    });

    Route::controller(HistoriPermohonanAlumniController::class)->group(function () {
        Route::get('/historialumni', 'index');
        Route::get('/historialumni/detail/{id}', 'detail');
        // Route::put('/profile', 'update')->name('profile.update');
    });

    Route::get('/formulir', [FormulirController::class, 'index'])->name('formulir');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});





require __DIR__ . '/auth.php';
