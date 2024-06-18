<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use PDF; // Correctly reference the facade

class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice.create');
    }

    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->customer_name = $request->customer_name;
        $invoice->customer_phone = $request->customer_phone;
        $invoice->contact_person = $request->contact_person;
        $invoice->customer_tinnumber = $request->customer_tinnumber;
        $invoice->customer_address = $request->customer_address;
        $invoice->total_amount = 0; // Initialize amount
        $invoice->save();

        $totalAmount = 0;

        foreach ($request->items as $item) {
            $totalAmount += $item['quantity'] * $item['price'];
            $invoice->items()->create($item);
        }

        // Update the invoice with the total amount
        $invoice->total_amount = $totalAmount;
        $invoice->save();
        $invoices = Invoice::with('items')->get();


        return view('invoice.index', compact('invoices'));
    }



    public function index()
    {
        $invoices = Invoice::with('items')->get();
        return view('invoice.index', compact('invoices'));
    }

    public function generatePDF($id)
    {
        $invoice = Invoice::with('items')->find($id);
        $pdf = PDF::loadView('invoice.pdf', compact('invoice'));
        return $pdf->download('invoice-'.$invoice->invoice_number .'.pdf');
    }
}
