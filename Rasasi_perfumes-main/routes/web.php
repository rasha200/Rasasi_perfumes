<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;


use Illuminate\Support\Facades\Auth;

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

Auth::routes();



// <!--==========================================  (HOME)  ========================================================================================================================-->


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);
// <!--==========================================  (Dashboard)  ============================================================================================================================-->
Route::get('/dashboard', function () {
    return view('layouts.dashboard_master');
})->name('dashboard')->middleware(['auth' , 'role']);




// <!--==========================================  (Users)  ===============================================================================================================-->
Route::resource('users', UserController::class)->middleware(['auth' , 'manager']);




// <!--==========================================  (Categories)  =================================================================================================================-->
Route::resource('categories', CategoryController::class)->middleware(['auth' , 'role']);





// <!--==========================================  (Sub Categories)  =================================================================================================================-->
Route::resource('subCategories', SubCategoryController::class)->middleware(['auth' , 'role']);




// <!--==========================================  (Contacts)  ==================================================================================================================-->

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');