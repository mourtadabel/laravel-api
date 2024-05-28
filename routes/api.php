<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ClubController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('students', [StudentController::class,'index']);
Route::post('students', [StudentController::class,'upload']);
Route::put('students/edit/{id}', [StudentController::class,'edit']);
Route::delete('students/delete/{id}', [StudentController::class,'delete']);

Route::get('fields', [FieldController::class,'index']);
Route::post('fields', [FieldController::class,'upload']);
Route::put('fields/edit/{id}', [FieldController::class,'edit']);
Route::delete('fields/delete/{id}', [FieldController::class,'delete']);

Route::get('/clubs', [ClubController::class, 'index']);
Route::post('/clubs', [ClubController::class, 'upload']);
Route::put('/clubs/edit/{id}', [ClubController::class, 'edit']);
Route::delete('/clubs/delete/{id}', [ClubController::class, 'delete']);


Route::post('/clubs/{club}/students', [ClubController::class, 'addStudent']);
Route::delete('/clubs/{club}/students/{student}', [ClubController::class, 'removeStudent']);
Route::get('/clubs/{club}/students', [ClubController::class, 'listStudents']);