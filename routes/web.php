<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students', [\App\Http\Controllers\StudentsController::class, 'index']);


Route::get('/students/create/post', [\App\Http\Controllers\StudentsController::class, 'create']); 
Route::post('/students/create/post', [\App\Http\Controllers\StudentsController::class, 'store']); 
Route::get('/students/edit/{students}', [\App\Http\Controllers\StudentsController::class, 'edit']); 
Route::put('/students/edit/{students}', [\App\Http\Controllers\StudentsController::class, 'update']); 
Route::delete('/students/delete/{students}', [\App\Http\Controllers\StudentsController::class, 'destroy']); 




Route::get('/departments', [\App\Http\Controllers\DepartmentsController::class, 'index']);
Route::get('/departments/create/post', [\App\Http\Controllers\DepartmentsController::class, 'create']); 
Route::post('/departments/create/post', [\App\Http\Controllers\DepartmentsController::class, 'store']); 
Route::delete('/departments/delete/{departments}', [\App\Http\Controllers\DepartmentsController::class, 'destroy']); 
