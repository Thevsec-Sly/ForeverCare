<?php

use App\Http\Controllers\admissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\drugController;
use Termwind\Components\Raw;

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('patients', PatientController::class);
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');


Route::resource('drugs', drugController::class);
Route::get('/drug', [drugController::class, 'index'])->name('drugs.index');


Route::resource('admissions', admissionController::class);
Route::get('/admissions',[admissionController::class, 'index'])->name('admissions.index');