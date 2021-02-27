<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CertificateController;

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
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [Profilecontroller::class, 'index'])->name('profile.index');
    Route::get('/profile/{user}/edit', [Profilecontroller::class, 'edit'])->name('profile.edit');
    Route::post('/profile/{user}/update', [Profilecontroller::class, 'update'])->name('profile.update');

    Route::get('/portfolio/certificate/{portfolio}/edit', [CertificateController::class, 'edit'])->name('portfolio.certificate.index');
    Route::post('/portfolio/certificate', [CertificateController::class, 'store'])->name('portfolio.certificate.store');
    Route::delete('/portfolio/certificate/{certificate}/delete', [CertificateController::class, 'destroy'])->name('portfolio.certificate.destroy');
});



Route::resource('tasks', TaskController::class)->middleware('auth');
Auth::routes();