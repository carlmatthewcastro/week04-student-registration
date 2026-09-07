<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('students', StudentController::class)->only(['index', 'create', 'store', 'show', 'destroy']);