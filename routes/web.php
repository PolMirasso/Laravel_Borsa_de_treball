<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CompanyController;
use \App\Http\Controllers\PublicController;
use \App\Http\Controllers\StudentController;
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
//Route::get('/user', [UserController::class, 'index']);




Route::view('/login', "public.login")->name('login');
Route::view('/register', "public.register")->name('register');
Route::get('/logout', [PublicController::class, 'logout'])->name('logout');

Route::get('/ajax', [StudentController::class, 'ajax'])->name('ajax');


Route::post('/validar-registro', [PublicController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [PublicController::class, 'login'])->name('inicia-sesion');

Route::resource('/company', CompanyController::class);
Route::resource('/public', PublicController::class);
Route::resource('/admin', AdminController::class)->middleware('auth');
Route::resource('/student', StudentController::class)->middleware('auth');
