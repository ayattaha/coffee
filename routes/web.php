<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CategoryController;


// route for wave cafe pages
Route::get('/',[CoffeeController :: class,'index'])->name('index');
Route::get('aboutUs',[CoffeeController :: class,'aboutUs'])->name('aboutUs');
Route::get('specialItem',[CoffeeController :: class,'specialItem'])->name('specialItem');
Route::get('contact',[CoffeeController :: class,'contact'])->name('contact');

// route for admin 


Auth::routes(['verify'=>true]);

Route::prefix('/admin')->middleware('verified')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    //Route::get('/home', [UserController::class, 'index'])->name('home');

   // Route to add data of user table
    Route::get('/adduser',[AdminController :: class,'adduser'])->name('adduser');
    Route::post('/insertuser',[UserController :: class,'store'])->name('insertuser');
    
    // Route to update data of user table
    Route::get('/editUser/{id}',[UserController::class,'edit'])->name('editUser');
    Route::put('/updateUser/{id}',[UserController::class,'update'])->name('updateUser');
    
    // Route to soft delete users
    Route::delete('/deleteUser',[UserController::class,'destroy'])->name('deleteUser');
    Route::get('/trashedUser',[UserController::class,'showDeleted'])->name('trashedUser');
    Route::get('/restorUser/{id}',[UserController::class,'restore'])->name('restorUser');
    Route::delete('/forceDeleteUser',[UserController::class,'forceDelete'])->name('forceDeleteUser');

    
    // Route for beverages
    Route::get('/beverages',[BeverageController :: class,'beverages'])->name('beverages');

     // Route to update data of beverages table
    Route::get('/editBeverages/{id}',[BeverageController :: class,'edit'])->name('editBeverages');
    Route::put('/updateBeverages/{id}',[BeverageController::class,'update'])->name('updateBeverages');
    
// Route to soft delete beverages
     Route::delete('/deleteBeverage',[BeverageController::class,'destroy'])->name('deleteBeverage');
     Route::get('/trashedBeverage',[BeverageController::class,'showDeleted'])->name('trashedBeverage');
     Route::get('/restorBeverage/{id}',[BeverageController::class,'restore'])->name('restorBeverage');
     Route::delete('/forceDeleteBeverage',[BeverageController::class,'forceDelete'])->name('forceDeleteBeverage');

     // Routes to Add Beverage
     Route::get('/addBeverages',[BeverageController :: class,'addBeverages'])->name('addBeverages');
     Route::post('/insertBeverage',[BeverageController :: class,'store'])->name('insertBeverage');
    
    // Routes for Categories
    // first Roues to show categories list
    Route::get('/categories',[CategoryController :: class,'categories'])->name('categories');
   
    
    // Route to update data of category table
    Route::get('/editCategories/{id}',[CategoryController :: class,'edit'])->name('editCategories');
    Route::put('/updateCategories/{id}',[CategoryController::class,'update'])->name('updateCategories');

    // Route to force delete category only if it has no data in the beverages table.
     Route::delete('/forceDeleteCategory/{id}',[CategoryController::class,'destroy'])->name('forceDeleteCategory');

    // Routes to Add category
     Route::get('/addCategory',[AdminController :: class,'addCategory'])->name('addCategory');
     Route::post('/insertCategory',[CategoryController :: class,'store'])->name('insertCategory');
    
 
 
 
     Route::get('/messages',[AdminController :: class,'messages'])->name('messages');
    // Route::get('/showMessages',[AdminController :: class,'showMessages'])->name('showMessages');
    
});




// Route::get('admin/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 
Route::get('test', function () {
    return view('auth.register');
});