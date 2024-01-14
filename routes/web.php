<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SuppliersController;
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
    return view('main');
});


Route::get('/dashboard/index', [DashboardController::class,'index'])->name('dashboard.index');
Route::get('/sales_report', [ReportsController::class,'index'])->name('sales_report');
Route::get('/profit_loss_report', [ReportsController::class,'profitLossReport'])->name('profit_loss_report');
Route::get('/export/sales/report', [ReportsController::class,'salesReport'])->name('export.sales.report');
Route::get('/export/profitloss/report', [ReportsController::class,'profitLossReportExport'])->name('export.profitloss.report');

Route::get('/categories/index', [ProductCategoryController::class,'index'])->name('categories.index');

Route::post('/categories/store',[ProductCategoryController::class,'store'])->name('categories.create');

Route::get('/inventory/index', [InventoryController::class,'index'])->name('inventory.index');

Route::post('/inventory/store',[InventoryController::class,'store'])->name('inventory.create');
Route::get('/product/getPrices/{id}',[InventoryController::class,'getPrices']);

Route::get('/purchase/index', [PurchasesController::class,'index'])->name('purchase.index');

Route::post('/purchase/store',[PurchasesController::class,'store'])->name('purchase.create');

Route::get('/sales/index', [SalesController::class,'index'])->name('sales.index');

Route::post('/sales/store',[SalesController::class,'store'])->name('sales.create');


Route::get('/customers/index', [CustomerController::class,'index'])->name('customers.index');

Route::post('/customers/store',[CustomerController::class,'store'])->name('customers.create');


Route::get('/suppliers/index', [SuppliersController::class,'index'])->name('suppliers.index');

Route::post('/suppliers/store',[SuppliersController::class,'store'])->name('suppliers.create');

