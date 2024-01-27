<?php

namespace App\Http\Controllers;

use App\Models\Mashamba;
use Illuminate\Http\Request;

class MashambaController extends Controller
{
    public function index(){
        $mashamba = Mashamba::all();
        return view('mashamba.index', compact('mashamba'));
    }

    public function store(Request $request){
      // Validation
      $request->validate([
        'location' => 'required|string|max:255',
        'buying_cost' => 'nullable|string|max:255',
        'size' => 'nullable|string|max:255',
        'date_of_buying' => 'nullable|string|max:255',
    ]);

    // Save category to the database or perform other actions
    // For simplicity, let's assume you have a Category model and table
    Mashamba::create($request->all());

    // Redirect or return a response as needed
    return redirect()->route('mashamba.index')->with('success', 'Category added successfully');
}
}
