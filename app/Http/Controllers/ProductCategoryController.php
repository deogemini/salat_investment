<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductPurchase;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = ProductCategory::orderby('created_at', 'ASC')->get();
        return view('products_category.index', compact('categories'));
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
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Save category to the database or perform other actions
        // For simplicity, let's assume you have a Category model and table
        ProductCategory::create($request->all());

        // Redirect or return a response as needed
        return redirect()->route('categories.index')->with('success', 'Category added successfully');
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
