<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FieldController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('student', [StudentController::class,'index']);
Route::post('student', [StudentController::class,'upload']);
Route::put('student/edit/{id}', [StudentController::class,'edit']);
Route::delete('student/delete/{id}', [StudentController::class,'delete']);

Route::get('field', [FieldController::class,'index']);
Route::post('field', [FieldController::class,'upload']);
Route::put('field/edit/{id}', [FieldController::class,'edit']);
Route::delete('field/delete/{id}', [FieldController::class,'delete']);