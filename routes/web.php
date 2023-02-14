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

Route::post('/validar-registro', [PublicController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [PublicController::class, 'login'])->name('inicia-sesion');

Route::resource('company', CompanyController::class);

Route::get('/borsa-treball', [PublicController::class, 'viewBorsa'])->name('borsa-treball');
Route::get('/public/getData', [PublicController::class, 'getData'])->name('getData');
Route::resource('public', PublicController::class);

//manejar ofertes admin
Route::get('/admin/getAllData', [AdminController::class, 'getAllData'])->name('getAllData')->middleware('auth');
Route::get('/admin/accept/{id}', [AdminController::class, 'accept'])->name('accept')->middleware('auth');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit')->middleware('auth');
Route::patch('/admin/updatePublish/{id}', [AdminController::class, 'updatePublish'])->name('updatePublish')->middleware('auth');
Route::get('/admin/deny/{id}', [AdminController::class, 'deny'])->name('deny')->middleware('auth');

//manejar users admin
Route::get('/admin/user/edit/{id}', [AdminController::class, 'userEdit'])->name('userEdit')->middleware('auth');
Route::get('/admin/user/delete/{id}', [AdminController::class, 'deny'])->name('deny')->middleware('auth');
Route::get('/admin/getUsersData', [AdminController::class, 'getUsersData'])->name('getUsersData')->middleware('auth');
Route::get('/admin/users', [AdminController::class, 'usersView'])->name('usersView')->middleware('auth');
Route::get('/admin/addUsr', [AdminController::class, 'addUsr'])->name('addUsr')->middleware('auth');
Route::post('/admin/validar-registro', [AdminController::class, 'registerAdmin'])->name('validar-admin')->middleware('auth');

//manejar peticions alumnes admins
Route::get('/admin/getStudentRequests', [AdminController::class, 'getStudentRequests'])->name('getStudentRequests')->middleware('auth');
Route::get('/admin/requestView', [AdminController::class, 'requestView'])->name('requestView')->middleware('auth');
Route::get('/admin/downloadCV/{id}', [AdminController::class, 'downloadCV'])->name('downloadCV')->middleware('auth');

Route::resource('admin', AdminController::class)->middleware('auth');

//manejar ofertes alumnes
Route::get('/student/contact/{id}', [StudentController::class, 'contact'])->name('contact')->middleware('auth');
Route::post('/student/saveContact/{id}', [StudentController::class, 'saveContact'])->name('saveContact')->middleware('auth');
Route::resource('student', StudentController::class)->middleware('auth');
