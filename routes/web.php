<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GuestController;

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

Route::get('/', [GuestController::class, 'home'])->name('home');

Route::get('/about', [GuestController::class, 'aboutView'])->name('aboutView');
Route::get('/donation', [GuestController::class, 'donationView'])->name('donationView');

Route::post('/login/load', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/GantiPassword/Load', [LoginController::class, 'gantiPassword'])->name('gantiPassword')->middleware('auth');

Route::get('/addUser', [AdminController::class, 'addUserView'])->name('addUserView')->middleware('auth', 'admin');
Route::post('/addUser/process', [AdminController::class, 'addUserProcess'])->name('addUserProcess')->middleware('auth', 'admin');

Route::get('/addParent', [AdminController::class, 'addParentView'])->name('addParentView')->middleware('auth', 'admin');
Route::post('/addParent/process', [AdminController::class, 'addParentProcess'])->name('addParentProcess')->middleware('auth', 'admin');

Route::get('/updateProgress', [AdminController::class, 'updateProgressView'])->name('updateProgressView')->middleware('auth', 'admin');
Route::post('/updateProgress/process', [AdminController::class, 'updateProgressProcess'])->name('updateProgressProcess')->middleware('auth', 'admin');

Route::get('/absent', [AdminController::class, 'absentView'])->name('absentView')->middleware('auth', 'admin');
Route::post('/absent/process', [AdminController::class, 'absentProcess'])->name('absentProcess')->middleware('auth', 'admin');

Route::get('/addActivity', [AdminController::class, 'addActivityView'])->name('addActivityView')->middleware('auth', 'admin');
Route::post('/addActivity/process', [AdminController::class, 'addActivityProcess'])->name('addActivityProcess')->middleware('auth', 'admin');

Route::get('/addPointExchangeItem', [AdminController::class, 'addPointExchangeItemView'])->name('addPointExchangeItemView')->middleware('auth', 'admin');
Route::post('/addPointExchangeItem/process', [AdminController::class, 'addPointExchangeItemProcess'])->name('addPointExchangeItemProcess')->middleware('auth', 'admin');

Route::get('/addAdmin', [SuperAdminController::class, 'addAdminView'])->name('addAdminView')->middleware('auth', 'superAdmin');
Route::post('/addAdmin/process', [SuperAdminController::class, 'addAdminProcess'])->name('addAdminProcess')->middleware('auth', 'superAdmin');
Route::get('/deleteAdmin', [SuperAdminController::class, 'deleteAdminView'])->name('deleteAdminView')->middleware('auth', 'superAdmin');
Route::post('/deleteAdmin/process', [SuperAdminController::class, 'deleteAdminProcess'])->name('deleteAdminProcess')->middleware('auth', 'superAdmin');

Route::get('/profile/{id}', [UserController::class, 'viewProfile'])->name('viewProfile')->middleware('auth', 'parentOrUser');
Route::get('/tukarPoint', [UserController::class, 'pointExchangeView'])->name('pointExchangeView')->middleware('auth');
