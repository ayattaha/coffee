<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\AdminController;

// route for wave cafe pages
Route::get('/',[CoffeeController :: class,'index'])->name('index');
Route::get('aboutUs',[CoffeeController :: class,'aboutUs'])->name('aboutUs');
Route::get('specialItem',[CoffeeController :: class,'specialItem'])->name('specialItem');
Route::get('contact',[CoffeeController :: class,'contact'])->name('contact');

// route for admin 
Route::get('/admin/users',[AdminController :: class,'index'])->name('adminUser');
Route::get('/admin/adduser',[AdminController :: class,'adduser'])->name('adduser');
Route::get('/admin/addBeverages',[AdminController :: class,'addBeverages'])->name('addBeverages');
Route::get('/admin/addCategory',[AdminController :: class,'addCategory'])->name('addCategory');
Route::get('/admin/beverages',[AdminController :: class,'beverages'])->name('beverages');
Route::get('/admin/categories',[AdminController :: class,'categories'])->name('categories');
// Route::get('/admin/editBeverages',[AdminController :: class,'editBeverages'])->name('editBeverages');
// Route::get('/admin/editCategories',[AdminController :: class,'editCategories'])->name('editCategories');
// Route::get('/admin/editUser',[AdminController :: class,'editUser'])->name('editUser');
Route::get('/admin/messages',[AdminController :: class,'messages'])->name('messages');
// Route::get('/admin/showMessages',[AdminController :: class,'showMessages'])->name('showMessages');





// Route::get('test', function () {
//     return view('admin.showMessages');
// });
