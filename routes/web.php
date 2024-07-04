<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
// route for wave cafe pages
Route::get('/',[CoffeeController :: class,'index'])->name('index');
Route::get('aboutUs',[CoffeeController :: class,'aboutUs'])->name('aboutUs');
Route::get('specialItem',[CoffeeController :: class,'specialItem'])->name('specialItem');
Route::get('contact',[CoffeeController :: class,'contact'])->name('contact');

// route for admin 


Auth::routes(['verify'=>true]);

Route::prefix('/admin')->middleware('verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/adduser',[AdminController :: class,'adduser'])->name('adduser');
    Route::get('/addBeverages',[AdminController :: class,'addBeverages'])->name('addBeverages');
    Route::get('/addCategory',[AdminController :: class,'addCategory'])->name('addCategory');
    Route::get('/beverages',[AdminController :: class,'beverages'])->name('beverages');
    Route::get('/categories',[AdminController :: class,'categories'])->name('categories');
    // Route::get('/editBeverages',[AdminController :: class,'editBeverages'])->name('editBeverages');
    // Route::get('/editCategories',[AdminController :: class,'editCategories'])->name('editCategories');
    // Route::get('/editUser',[AdminController :: class,'editUser'])->name('editUser');
    Route::get('/messages',[AdminController :: class,'messages'])->name('messages');
    // Route::get('/showMessages',[AdminController :: class,'showMessages'])->name('showMessages');
    
});




// Route::get('admin/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 
Route::get('test', function () {
    return view('auth.register');
});