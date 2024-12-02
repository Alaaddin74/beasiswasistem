<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::resource('/admin/scholarships', ScholarshipController::class);
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/home', [Controller::class, 'index'])->name('home');
    Route::get('/scholarship', [Controller::class, 'scholarship'])->name('scholarship');
    Route::get('/dafter/{scholarshipId}', [Controller::class, 'dafter'])->name('dafter');
    Route::get('/application', [Controller::class, 'application'])->name('application');
    Route::get('/profile', [Controller::class, 'profile'])->name('profile');
    Route::post('/profile', [Controller::class, 'storeProfile'])->name('storeProfile');
    Route::post('/scholarship-application', [ScholarshipController::class, 'store'])->name('scholarships.dafter.store');
    Route::get('/applications/{id}/edit', [ScholarshipController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{id}', [ScholarshipController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{id}', [ScholarshipController::class, 'destroy'])->name('applications.destroy');

});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
