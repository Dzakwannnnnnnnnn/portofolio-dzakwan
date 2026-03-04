<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\CapabilityController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\DocumentationController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman publik dokumentasi
Route::get('/dokumentasi', [DocumentationController::class, 'publicIndex'])->name('dokumentasi.index');
Route::get('/dokumentasi/{documentation}', [DocumentationController::class, 'publicShow'])->name('dokumentasi.show');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect('/admin');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('profile', ProfileController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('educations', EducationController::class)->except(['show']);
    Route::resource('capabilities', CapabilityController::class)->except(['show']);
    Route::resource('certifications', CertificationController::class)->except(['show']);

});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('documentations', \App\Http\Controllers\DocumentationController::class);
});
require __DIR__ . '/auth.php';
