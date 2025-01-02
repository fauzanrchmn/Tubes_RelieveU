<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Http\Controllers\CounselingHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ContentController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [loginController::class, 'indexlogin'])->name('layouts.login');
Route::post('/login', [loginController::class, 'login']);
// Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');

Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
Route::get('/contents/{content}', [ContentController::class, 'show'])->name('contents.show');
Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');

Route::get('/appointments', [DoctorAppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [DoctorAppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [DoctorAppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/{doctorAppointment}', [DoctorAppointmentController::class, 'show'])->name('appointments.show');
Route::get('/appointments/{doctorAppointment}/edit', [DoctorAppointmentController::class, 'edit'])->name('appointments.edit');
Route::put('/appointments/{doctorAppointment}', [DoctorAppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/appointments/{doctorAppointment}', [DoctorAppointmentController::class, 'destroy'])->name('appointments.destroy');

Route::get('/counseling_histories', [CounselingHistoryController::class, 'index'])->name('counseling_histories.index');
Route::get('/counseling_histories/create', [CounselingHistoryController::class, 'create'])->name('counseling_histories.create');
Route::post('/counseling_histories', [CounselingHistoryController::class, 'store'])->name('counseling_histories.store');
Route::get('/counseling_histories/{counselingHistory}/edit', [CounselingHistoryController::class, 'edit'])->name('counseling_histories.edit');
Route::put('/counseling_histories/{counselingHistory}', [CounselingHistoryController::class, 'update'])->name('counseling_histories.update');