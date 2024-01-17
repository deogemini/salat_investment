<?php

namespace App\Http\Controllers;

use App\Models\Deposition;
use Illuminate\Http\Request;

class DepositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depositions = Deposition::orderby('created_at', 'DESC')->get();
        return view('balance_collected.index', compact('depositions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'depositer_name' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
        ]);

        // Save category to the database or perform other actions
        // For simplicity, let's assume you have a Category model and table
        Deposition::create($request->all());

        // Redirect or return a response as needed
        return redirect()->route('deposition.index')->with('success', 'Category added successfully');
    }

    /**
     * Store a newly created resource in storage.
     */

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
