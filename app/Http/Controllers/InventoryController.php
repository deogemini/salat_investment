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

        $productName =  $request->input('product_name');
        $productDescription = $request->input('product_description');
        $productCategoryId = $request->input('product_category_id');
        $retailPrice = $request->input('retail_price' );

        $inventoryRecord = new InventoryProduct();
        $inventoryRecord->product_name = $productName;
        $inventoryRecord->product_description = $productDescription;
        $inventoryRecord->product_category_id = $productCategoryId;
        $inventoryRecord->retail_price = $retailPrice;

        $referenceNumber = 1000;
        $inventoryRecord->reference_number = $referenceNumber + 1;
        $inventoryRecord->save();


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
