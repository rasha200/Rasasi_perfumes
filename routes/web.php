<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;

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




// <!--==========================================  (profile)  ===============================================================================================================-->
// Route::get('/profile', [UserController::class, 'show_profile_dash'])->name('dashboard.profile.profile');---
// Route::get('/profile', [UserController::class, 'show_profile_dash'])->name('dashboard.profile.profile')->middleware(['auth' , 'role']);---

// Route::get('/profile', [UserController::class, 'show'])->name('profile.show');---
// Route::put('/profile', [UserController::class, 'update'])->name('profile.update');---



Route::get('/profile', [UserController::class, 'show_profile'])->name('profile.show');
Route::get('/profile_dashboard', [UserController::class, 'show_profile_dash'])->name('profile_dash.show')->middleware(['auth' , 'role']);
Route::put('/profile', [UserController::class, 'update_profile'])->name('profile.update');


// <!--==========================================  (contacts)  ===============================================================================================================-->
Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index'); // List all contacts (dashboard)
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show'); // Show
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy'); // Delete
});

// Public routes
// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create'); // Create form (user side)
// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store'); // Create
Route::get('/contact', [ContactController::class, 'landing'])->name('contact');


// Route::get('/contact', function () {
//     return view('contact');
// })->name("contact");




// لعرض صفحة الاتصال
Route::get('/contact', [ContactController::class, 'landing'])->name('contact.landing');

// لمعالجة البيانات المُرسلة من النموذج
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// لعرض الرسائل في لوحة التحكم
Route::get('/dashboard/contacts', [ContactController::class, 'index'])->name('contacts.index');



// <!--==========================================  (Categories)  =================================================================================================================-->
Route::resource('categories', CategoryController::class)->middleware(['auth' , 'role']);





// <!--==========================================  (Sub Categories)  =================================================================================================================-->
Route::resource('subCategories', SubCategoryController::class)->middleware(['auth' , 'role']);




// <!--==========================================  (Products)  ===================================================================================================================-->
Route::resource('products', ProductController::class)->middleware(['auth' , 'role']);
Route::delete('/product_images/{product_image}', [productImageController::class, 'destroy'])->name('product_images.destroy')->middleware(['auth' , 'role']);
Route::get('/subcategory/{id}', [ProductController::class, 'productsBySubCategory'])->name('products.bySubCategory');
Route::get('/category/{id}', [ProductController::class, 'productsByCategory'])->name('products.byCategory');







