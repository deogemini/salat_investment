<?php

namespace App\Http\Controllers;

use App\Exports\profitLossReportExport;
use App\Exports\SalesReportExport;
use App\Models\InventoryProduct;
use App\Models\ProductPurchase;
use App\Models\ProductSales;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $total_quantity_in ='0';

        return view('reports.sales',  compact('total_quantity_in','inventoryProducts','productSales', 'total_profit', 'total_sales'));
    }

        public function salesReport()
        {
            $data = InventoryProduct::all()->map(function ($inventoryProduct) {
                return [
                    '#' => $inventoryProduct->id,
                    'Product Name' => $inventoryProduct->product_name,
                    'Initial Stock (items)' => $inventoryProduct->quantity_in,
                    'Total Cost Purchase' => $inventoryProduct->purchasedProducts->sum('total_cost'),
                    'Sold Quantity (items)' => $inventoryProduct->productSales->sum('quantity'),
                    'Total Sales' => $inventoryProduct->productSales->sum('total_cost'),
                    'Stock Remained' => $inventoryProduct->quantity_now,
                ];
            });

            $headings = [
                '#',
                'Product Name',
                'Initial Stock (items)',
                'Total Cost Purchase',
                'Sold Quantity (items)',
                'Total Sales',
                'Stock Remained',
            ];

            $title = 'Salat Investment';


            return Excel::download(new SalesReportExport($data, $headings, $title), 'Sales Report.xlsx');
        }
        public function profitLossReportExport()
        {
            $data = InventoryProduct::all()->map(function ($inventoryProduct) {
                return [
                    '#' => $inventoryProduct->id,
                    'Product Name' => $inventoryProduct->product_name,
                    'Total Cost Purchase' => $inventoryProduct->purchasedProducts->sum('total_cost'),
                    'Total Sales' => $inventoryProduct->productSales->sum('total_cost'),
                    'Profit/Loss' => ($inventoryProduct->productSales->sum('total_cost')) - ($inventoryProduct->purchasedProducts->sum('total_cost')),
                ];
            });

            $headings = [
                '#',
                'Product Name',
                'Total Cost Purchase',
                'Total Sales',
                'Profit/Loss',
            ];

            $title = 'Salat Investment';


            return Excel::download(new ProfitLossReportExport($data, $headings, $title), 'Profit and Loss Report.xlsx');
        }

    /**
     * Show the form for creating a new resource.
     */
    public function profitLossReport()
    {

        $productSales = ProductSales::all();
        $total_sales = ProductSales::sum('total_cost');
        $total_purchases = ProductPurchase::sum('total_cost');
        $total_profit = $total_sales - $total_purchases;

        $inventoryProducts = InventoryProduct::with('productSales')->get();

        return view('reports.profitloss',  compact('inventoryProducts','productSales', 'total_profit', 'total_sales'));
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
