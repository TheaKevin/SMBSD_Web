<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login/load', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/addUser', [AdminController::class, 'addUserView'])->name('addUserView')->middleware('auth', 'admin');
Route::post('/addUser/process', [AdminController::class, 'addUserProcess'])->name('addUserProcess')->middleware('auth', 'admin');

Route::get('/addParent', [AdminController::class, 'addParentView'])->name('addParentView')->middleware('auth', 'admin');
Route::post('/addParent/process', [AdminController::class, 'addParentProcess'])->name('addParentProcess')->middleware('auth', 'admin');

Route::get('/updateProgress', [AdminController::class, 'updateProgressView'])->name('updateProgressView')->middleware('auth', 'admin');
Route::post('/updateProgress/process', [AdminController::class, 'updateProgressProcess'])->name('updateProgressProcess')->middleware('auth', 'admin');

Route::get('/addAdmin', [SuperAdminController::class, 'addAdminView'])->name('addAdminView')->middleware('auth', 'superAdmin');
Route::post('/addAdmin/process', [SuperAdminController::class, 'addAdminProcess'])->name('addAdminProcess')->middleware('auth', 'superAdmin');
Route::get('/deleteAdmin', [SuperAdminController::class, 'deleteAdminView'])->name('deleteAdminView')->middleware('auth', 'superAdmin');
Route::post('/deleteAdmin/process', [SuperAdminController::class, 'deleteAdminProcess'])->name('deleteAdminProcess')->middleware('auth', 'superAdmin');
