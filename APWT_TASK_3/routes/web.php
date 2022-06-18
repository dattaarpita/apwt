<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [pageController::class,'home'])->name('home');
Route::get('/services', [pageController::class,'services'])->name('services');
Route::get('/about', [pageController::class,'about'])->name('about');
Route::get('/departments', [pageController::class,'department'])->name('departments');
Route::get('/Registration',[PatientController::class,'register'])->name('registration');
Route::post('/submitted',[PatientController::class,'create'])->name('submitteddata');
Route::get('/login',[PatientController::class,'log'])->name('login');
Route::get('/Dashboard',[PatientController::class,'dashboard'])->name('dashboard')->middleware('ValidPatient');

Route::get('/Contact',[pageController::class,'contact'])->name('contact');
Route::post('/ShowQuery',[pageController::class,'submittedcontact'])->name('query');
Route::post('/login',[PatientController::class,'loginRequest'])->name('login');
Route::get('/logout',[PatientController::class,'logout'])->name('logout');
Route::get('/profile',[PatientController::class,'viewProfile'])->name('profile')->middleware('ValidPatient');


Route::get('/edit',[PatientController::class,'editProfile'])->name('edit_profile')->middleware('ValidPatient');

Route::post('/update',[PatientController::class,'edit_Profile'])->name('editted')->middleware('ValidPatient');
Route::get('/adminLogin',[AdminController::class,'index'])->name('admin_log');
Route::post('/adminLogin',[AdminController::class,'adminlogin'])->name('admin_login');
Route::get('/admin_dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard')->middleware('ValidAdmin');

Route::get('/admin_logout',[AdminController::class,'logout'])->name('admin_logout');
Route::get('/create_patient',[AdminController::class,'patient_reg'])->name('create_patient')->middleware('ValidAdmin');
Route::post('/adminc_patient',[AdminController::class,'create'])->name('addpatient')->middleware('ValidAdmin');
Route::get('/manage_patients',[AdminController::class,'showUsers'])->name('manage_patients')->middleware('ValidAdmin');
Route::get('/c-{id}',[AdminController::class,'showUser'])->name('show_patient')->middleware('ValidAdmin');
Route::get('/cE-{id}',[AdminController::class,'editUser'])->name('edit_patient')->middleware('ValidAdmin');
Route::post('/up',[AdminController::class,'updateProfile'])->name('upProfile')->middleware('ValidAdmin');
Route::get('/cD-{id}',[AdminController::class,'deleteUser'])->name('delete_patient')->middleware('ValidAdmin');












