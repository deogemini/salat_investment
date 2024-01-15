<?php

namespace App\Http\Controllers;

use App\Models\ProductSales;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('main');
    }
public function showChart()
{
    // Fetch sales data from the database
    $salesData = ProductSales::select('created_at', 'total_cost')->get();

    // Group sales data by day
    $groupedSalesData = $salesData->groupBy(function($date) {
        return \Carbon\Carbon::parse($date->created_at)->format('Y-m-d');
    });

    // Calculate total sales for each day
    $dailySales = $groupedSalesData->map(function ($group) {
        return $group->sum('total_cost');
    });

    return response()->json([
        'labels' => $dailySales->keys(),
        'data' => $dailySales->values(),
    ]);
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
