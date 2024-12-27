<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CounselingHistoryController;

Route::resource('counseling_histories', CounselingHistoryController::class);
Route::resource('doctors', DoctorController::class);
