<?php

namespace App\Http\Controllers;

use App\Models\ProductSales;
use App\Models\ProductCategory;
use App\Models\InventoryProduct;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products_sales = ProductSales::orderby('created_at', 'ASC')->get();
        $categories = ProductCategory::orderby('created_at', 'ASC')->get();
        $products = InventoryProduct::orderby('created_at', 'ASC')->get();



        return view('sales.index', compact('products_sales', 'categories', 'products'));
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
        // Validation
        $request->validate([
            'product_inventory_id' => 'required|string|max:255',
             'product_cost' => 'required|string|max:255',
             'quantity'  => 'required|string|max:255',
        ]);

                // Retrieve validated data from the request
            $productInventoryId = $request->input('product_inventory_id');
            $productCost = $request->input('product_cost');
            $quantity = $request->input('quantity');

            // Calculate total_cost based on product_cost and quantity
            $totalCost = $productCost * $quantity;

            // Create a new instance of the ProductPurchase model and fill it with data
            $productPurchase = new ProductSales();
            $productPurchase->product_inventory_id = $productInventoryId;
            $productPurchase->product_cost = $productCost;
            $productPurchase->quantity = $quantity;
            $productPurchase->total_cost = $totalCost;

            // Save the data to the database
            $productPurchase->save();

        // Redirect or return a response as needed
        return redirect()->route('purchase.index')->with('success', 'Category added successfully');
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
