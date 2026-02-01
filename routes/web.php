<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login');

Route::get('login', [AuthController::class,'loginForm'])->name('login');  
Route::post('login', [AuthController::class,'login'])->name('login.store');  
Route::post('logout', [AuthController::class,'logout'])->name('logout');  

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class); 
});