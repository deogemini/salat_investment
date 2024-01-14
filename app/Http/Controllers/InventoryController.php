<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = InventoryProduct::with('productCategory')->get();

        $categories = ProductCategory::orderby('created_at', 'ASC')->get();

        return view('product_inventory.index', compact('inventories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getPrices($product_id){
        $prices = InventoryProduct::where('id', $product_id)->first();

        $prices_output = array();
        $prices_output[] = "<option value='' selected>Please Select Price </option>";
        $prices_output[] = '<option value="' . $prices->retail_price . '">' . "Retail Price: Tsh" . $prices->retail_price . '</option>';
        // $prices_output[] = '<option value="' . $prices->whole_sale_price . '">' . "Wholesale Price: Tsh " . $prices->whole_sale_price . '</option>';

        return $prices_output;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation

     $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
            'product_category_id' => 'required|string|max:255',
            'retail_price' => 'required|string|max:255',
            // 'whole_sale_price' => 'required|string|max:255',
        ]);


        // Save category to the database or perform other actions
        // For simplicity, let's assume you have a Category model and table
        $inede = InventoryProduct::create($request->all());


        // Redirect or return a response as needed
        return redirect()->route('inventory.index')->with('success', 'Inventory added successfully');
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
