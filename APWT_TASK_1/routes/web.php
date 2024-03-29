<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;

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


Route::get('/',[pageController::class,'hpage'])->name('Home');
Route::get('/medicine',[pageController::class,'med'])->name('medicines');
Route::get('/ourteam',[pageController::class,'teams'])->name('team');
Route::get('/aboutus',[pageController::class,'about'])->name('aboutus');
Route::get('/contactus',[pageController::class,'cont'])->name('contact');

