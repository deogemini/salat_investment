<?php

namespace App\Http\Controllers;

use App\Models\MatumiziInput;
use App\Models\MatumiziType;
use Illuminate\Http\Request;

class MatumiziController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matumizijumla = MatumiziInput::all();
        $ainamatumizi  = MatumiziType::all();

        return view('matumizi.index',compact('matumizijumla', 'ainamatumizi'));
    }
    public function aina_matumizi()
    {
        $ainamatumizi  = MatumiziType::all();
        return view('matumizi.matumizi_type',compact('ainamatumizi'));
    }
    public function aina_matumizi_create(Request $request)
    {
       // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        MatumiziType::create($request->all());

        // Redirect or return a response as needed
        return redirect()->route('ainamatumizi.index')->with('success', 'Matumizi Type added successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            // Validation
             $request->validate([
                 'amount' => 'required|string|max:255',
             ]);

             $matumizi = New MatumiziInput();
             $matumizi->matumizi_type_id = $request->matumizi_type_id;
             $matumizi->amount = $request->amount;
             $matumizi->save();
             // Redirect or return a response as needed
             return redirect()->route('matumizi.index')->with('success', 'Matumizi added successfully');
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
