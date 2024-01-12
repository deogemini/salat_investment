<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts/dashboard');
});


Route::get('/categories/index', [ProductCategoryController::class,'index'])->name('categories.index');

Route::post('/categories/store',[ProductCategoryController::class,'store'])->name('categories.create');
