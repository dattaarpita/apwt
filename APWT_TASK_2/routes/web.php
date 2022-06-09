<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\PatientController;

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
Route::post('/submitted',[PatientController::class,'submitted'])->name('submitteddata');
Route::get('/login',[PatientController::class,'log'])->name('login');
Route::post('/Dashboard',[PatientController::class,'loggedin'])->name('dashboard');
Route::get('/Contact',[pageController::class,'contact'])->name('contact');
Route::post('/ShowQuery',[pageController::class,'submittedcontact'])->name('query');





