<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\RedirectResponse;


Route::get('/groups/{group}/students/create', [StudentController::class, 'create']);
Route::post('/groups/{group}/students', [StudentController::class, 'store']);
Route::get('/groups/{group}/students/{student}', [StudentController::class, 'show']);
Route::resource('students', StudentController::class);
Route::resource('groups', GroupController::class);
Route::get('/', function () {
    return view('welcome');
});
