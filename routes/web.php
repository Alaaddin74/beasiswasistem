<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\manageApplications;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::resource('/admin/scholarships', ScholarshipController::class);
    Route::get('/admin/scholarshipform', [AdminController::class, 'scholarshipForm'])->name('admin.scholarship');
    Route::get('/admin/editScholarshipform/{id}', [AdminController::class, 'editScholarshipForm'])->name('admin.editScholarship');
    Route::put('/admin/scholarships/update/{id}', [AdminController::class, 'updateScholarship'])->name('scholarships.update');
    Route::delete('/admin/scholarshipform/{id}', [AdminController::class, 'destroy'])->name('scholarship.admin.destroy');
    Route::get('/admin/scholarships/create', [AdminController::class, 'createingView'])->name('admin.addScholarship');
    Route::post('/admin/scholarships/store', [AdminController::class, 'store'])->name('scholarships.store');

    Route::resource('manageApplications', manageApplications::class);

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
    Route::post('/notification/mark_read/{id}', [Controller::class, 'changeSeenStates'])->name('changeSeenStates');
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
