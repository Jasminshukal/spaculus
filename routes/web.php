<?php

use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/profile/{id}', [App\Http\Controllers\HomeController::class, 'UpdateProfile'])->name('UpdateProfile');
Route::get('User/{id}',[HomeController::class,'delete'])->name('remove.user');

// Task 2
Route::get('filemanager', [FileManagerController::class, 'index']);
