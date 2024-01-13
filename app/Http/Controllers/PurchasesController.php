<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use App\Models\ProductPurchase;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {

        $purchases = ProductPurchase::orderby('created_at', 'ASC')->with('productInventory')->get();
        $categories = ProductCategory::orderby('created_at', 'ASC')->get();
        $products = InventoryProduct::orderby('created_at', 'ASC')->get();

        return view('purchase.index', compact('purchases', 'categories', 'products'));
    }

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
            $productPurchase = new ProductPurchase();
            $productPurchase->product_inventory_id = $productInventoryId;
            $productPurchase->product_cost = $productCost;
            $productPurchase->quantity = $quantity;
            $productPurchase->total_cost = $totalCost;

            // Save the data to the database
            $productPurchase->save();

        // Redirect or return a response as needed
        return redirect()->route('purchase.index')->with('success', 'Category added successfully');
    }
}
