<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositionController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MashambaController;
use App\Http\Controllers\MatumiziController;
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

Route::get('/showChart', [DashboardController::class, 'showChart'])->name('showChart');

Route::get('/sales_report', [ReportsController::class,'index'])->name('sales_report');
Route::get('/profit_loss_report', [ReportsController::class,'profitLossReport'])->name('profit_loss_report');
Route::get('/export/sales/report', [ReportsController::class,'salesReport'])->name('export.sales.report');
Route::get('/export/profitloss/report', [ReportsController::class,'profitLossReportExport'])->name('export.profitloss.report');
Route::get('reports/salesperproduct', [ReportsController::class,'ProfitPerItem'])->name('reports.salesperproduct');

Route::get('/categories/index', [ProductCategoryController::class,'index'])->name('categories.index');

Route::post('/categories/store',[ProductCategoryController::class,'store'])->name('categories.create');
Route::post('/categories/destroy/{id}',[ProductCategoryController::class,'destroy'])->name('categories.destroy');

Route::get('/inventory/index', [InventoryController::class,'index'])->name('inventory.index');
Route::get('/inventory/destroy/{id}', [InventoryController::class,'index'])->name('inventory.destroy');

Route::post('/inventory/store',[InventoryController::class,'store'])->name('inventory.create');
Route::get('/product/getPrices/{id}',[InventoryController::class,'getPrices']);

Route::get('/purchase/index', [PurchasesController::class,'index'])->name('purchase.index');
Route::post('/purchase/destroy/{id}', [PurchasesController::class,'destroy'])->name('purchase.destroy');

Route::post('/purchase/store',[PurchasesController::class,'store'])->name('purchase.create');

Route::get('/sales/index', [SalesController::class,'index'])->name('sales.index');

Route::post('/sales/store',[SalesController::class,'store'])->name('sales.create');
Route::post('/sales/edit/{{$id}}',[SalesController::class,'edit'])->name('sales.edit');
Route::post('/sales/destroy/{{$id}}',[SalesController::class,'edit'])->name('sales.destroy');


Route::get('/customers/index', [CustomerController::class,'index'])->name('customers.index');

Route::post('/customers/store',[CustomerController::class,'store'])->name('customers.create');
Route::post('/customers/destroy/{id}',[CustomerController::class,'store'])->name('customers.destroy');


Route::get('/suppliers/index', [SuppliersController::class,'index'])->name('suppliers.index');

Route::post('/suppliers/store',[SuppliersController::class,'store'])->name('suppliers.create');
Route::post('/suppliers/destroy/{id}',[SuppliersController::class,'store'])->name('suppliers.destroy');


//-------------matumizi---------///
Route::get('/matumizi/index', [MatumiziController::class,'index'])->name('matumizi.index');
Route::get('/matofali/index', [MatumiziController::class,'indexMatofali'])->name('matofali.index');
Route::get('/matofali/destroy', [MatumiziController::class,'deleteMatofaliSales'])->name('matofali.destroy');
Route::get('/cement/index', [MatumiziController::class,'indexCement'])->name('cement.index');
Route::get('/mauzoMatofali/index', [MatumiziController::class,'indexMatofaliMauzo'])->name('mauzoMatofali.index');
Route::post('/matofaliMauzo/create', [MatumiziController::class,'UzaMatofali'])->name('matofaliMauzo.create');
Route::post('/matofali/ingizaStock', [MatumiziController::class,'ingizaStock'])->name('matofali.ingizaStock');
Route::post('/cement/ingizaStock', [MatumiziController::class,'ingizaStockCement'])->name('cement.ingizaStock');
Route::post('/cement/toaStock', [MatumiziController::class,'toaStockCement'])->name('cement.toaStock');
Route::post('/cement/destroy/{id}', [MatumiziController::class,'toaStockCement'])->name('cement.destroy');

Route::post('/matumizi/create', [MatumiziController::class,'create'])->name('matumizi.create');

Route::get('/ainamatumizi/index',[MatumiziController::class,'aina_matumizi'])->name('ainamatumizi.index');
Route::post('/ainamatumizi/create',[MatumiziController::class,'aina_matumizi_create'])->name('ainamatumizi.create');
Route::put('/ainamatumizi/update/',[MatumiziController::class,'aina_matumizi_update'])->name('ainamatumizi.update');
Route::post('/ainamatumizi/destroy/{id}', [MatumiziController::class, 'destroy'])->name('ainamatumizi.destroy');



//------------------------------//

Route::get('/deposition/index',[DepositionController::class,'index'])->name('deposition.index');
Route::post('/deposition/withdraw',[DepositionController::class,'withdraw'])->name('deposition.withdraw');
Route::get('/bankaccount/index',[DepositionController::class,'bankaccountIndex'])->name('bankaccount.index');
Route::post('/deposition/store',[DepositionController::class,'store'])->name('deposition.create');
Route::post('/bankaccount/store',[DepositionController::class,'bankaccountCreate'])->name('bankaccount.create');

Route::get('/login',[AuthController::class,'login']);
Route::get('/registration',[AuthController::class,'registration']);


Route::get('/mashamba/index',[MashambaController::class,'index'])->name('mashamba.index');
Route::post('/mashamba/create',[MashambaController::class,'store'])->name('mashamba.create');
Route::post('/mashamba/update',[MashambaController::class,'update'])->name('mashamba.update');

Route::get('/gharama_mashamba/index',[MashambaController::class,'indexGharamaZaMashamba'])->name('gharama_mashamba.index');
Route::post('/gharama_mashamba/create',[MashambaController::class,'create'])->name('gharama_mashamba.create');
Route::post('/gharama_mashamba/ongezaGharama',[MashambaController::class,'ongezaGharama'])->name('gharama_mashamba.ongezaGharama');


Route::get('invoice/index', [InvoiceController::class,'index'])->name('invoice.index');
Route::get('invoices/create', [InvoiceController::class,'create'])->name('invoices.create');
Route::post('invoices/store', [InvoiceController::class,'store'])->name('invoices.store');
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'generatePDF'])->name('invoices.pdf');


