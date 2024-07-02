<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;


Route::get('/',[CoffeeController :: class,'index'])->name('index');
Route::get('aboutUs',[CoffeeController :: class,'aboutUs'])->name('aboutUs');
Route::get('specialItem',[CoffeeController :: class,'specialItem'])->name('specialItem');
Route::get('contact',[CoffeeController :: class,'contact'])->name('contact');



// Route::get('/', function () {
//     return view('index');
// });
