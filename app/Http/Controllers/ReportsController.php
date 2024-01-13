<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use App\Models\ProductPurchase;
use App\Models\ProductSales;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productSales = ProductSales::all();
        $total_sales = ProductSales::sum('total_cost');
        $total_purchases = ProductPurchase::sum('total_cost');
        $total_profit = $total_sales - $total_purchases;

        $inventoryProducts = InventoryProduct::with('productSales')->get();

        return view('reports.sales',  compact('inventoryProducts','productSales', 'total_profit', 'total_sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
