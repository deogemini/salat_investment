<?php

namespace App\Http\Controllers;

use App\Models\Matofali;
use App\Models\MatofaliSales;
use App\Models\MatumiziCement;
use App\Models\MatumiziInput;
use App\Models\MatumiziType;
use Illuminate\Support\Facades\DB;

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

    public function ingizaStock(Request $request)
        {
                // Validation
                 $request->validate([
                     'bei_rejareja' => 'required|string|max:255',
                 ]);
                // Check if an entry with the given bei_rejareja exists
                $existingTofali = Matofali::where('bei_rejareja', $request->bei_rejareja)->first();

                if ($existingTofali) {
                    // If it exists, update the idadi_matofali_stock
                    $existingTofali->idadi_matofali_stock += $request->idadi_matofali_stock;
                    $existingTofali->save();
                } else {
                    // If it does not exist, create a new entry
                    $newTofali = new Matofali();
                    $newTofali->bei_rejareja = $request->bei_rejareja;
                    $newTofali->idadi_matofali_stock = $request->idadi_matofali_stock;
                    $newTofali->special_code = $this->generateSpecialCode(); // Call a method to generate the special code
                    $newTofali->save();
                            }

                 // Redirect or return a response as needed
                 return redirect()->route('matofali.index')->with('success', 'Umefanikiwa kuingiza Matofali kwenye Stock');
        }
    public function ingizaStockCement(Request $request)
        {
                // Validation
                 $request->validate([
                     'buying_price' => 'required|string|max:255',
                 ]);
                // Check if an entry with the given bei_rejareja exists

                    // If it does not exist, create a new entry
                    $cementMpya = new MatumiziCement();
                    $cementMpya->jina_cement = $request->cement_name;
                    $cementMpya->quantity_in = $request->idadi_cement_mifuko;
                    $cementMpya->buying_price = $request->buying_price;
                    $cementMpya->total_cost = ($request->buying_price *  $request->idadi_cement_mifuko) ;
                    $cementMpya->save();

                 // Redirect or return a response as needed
                 return redirect()->route('cement.index')->with('success', 'Umefanikiwa kuingiza cement kwenye Stock');
        }
    public function toaStockCement(Request $request)
        {
            $existingCement = MatumiziCement::where('id', $request->cement_id)->first();

            if ($existingCement) {
                // If it exists, update the idadi_matofali_stock
                $existingCement->quantity_out += $request->idadi_cement_mifuko;
                $existingCement->save();
            }

                 // Redirect or return a response as needed
                 return redirect()->route('cement.index')->with('success', 'Umefanikiwa kutoa cement kwenye Stock');
        }

        private function generateSpecialCode()
        {
            // Retrieve the last inserted special code
            $lastTofali = Matofali::orderBy('id', 'desc')->first();

            if ($lastTofali && preg_match('/Deo-(\d+)/', $lastTofali->special_code, $matches)) {
                $lastCode = (int)$matches[1];
                $newCode = $lastCode + 1;
            } else {
                $newCode = 1000; // Start from 1000 if no previous code exists
            }

            return 'Deo-' . $newCode;
        }

    public function aina_matumizi()
    {
        $ainamatumizi  = MatumiziType::all();
        return view('matumizi.matumizi_type',compact('ainamatumizi'));
    }
    public function indexMatofali()
    {
        $matofali  = Matofali::all();
        return view('matofali.index',compact('matofali'));
    }
    public function indexCement()
    {
        $cements  = MatumiziCement::all();
        return view('matumizi.cement.index',compact('cements'));
    }
    public function indexMatofaliMauzo()
    {
        $tofalizote  = Matofali::all();
        $mauzo_tofali  = MatofaliSales::all();
        return view('matofali.mauzo',compact('tofalizote','mauzo_tofali'));
    }
    public function UzaMaTofali(Request $request){
        $request->validate([
            'quantity' => 'required|string|max:255',
        ]);

        $price = Matofali::where('id', $request->matofali_stock_id)->value('bei_rejareja');

        try {
            // Start a transaction
            DB::beginTransaction();

            // Create a new sale record
            $mauzoMapya = new MatofaliSales();
            $mauzoMapya->matofali_stock_id = $request->matofali_stock_id;
            $mauzoMapya->quantity = $request->quantity;
            $mauzoMapya->total_cost = ($price * $mauzoMapya->quantity);

            if ($mauzoMapya->save()) {
                // If save is successful, update the stock
                $update_stock = Matofali::where('id', $request->matofali_stock_id)
                    ->increment('idadi_matofali_soldout', $request->quantity);

                // Commit the transaction
                DB::commit();
            } else {
                // Rollback the transaction if save fails
                DB::rollBack();
            }
        } catch (\Exception $e) {
            // Rollback the transaction in case of any errors
            DB::rollBack();
            // Optionally, handle the exception (e.g., log the error, return an error response, etc.)
        }


        return redirect()->route('mauzoMatofali.index')->with('success', 'Umefanikiwa kuingiza Mauzo ya Tofali');

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
