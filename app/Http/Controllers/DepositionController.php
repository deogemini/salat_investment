<?php

namespace App\Http\Controllers;

use App\Models\BankAccounts;
use App\Models\Deposition;
use App\Models\WithDraws;
use Illuminate\Http\Request;

class DepositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depositions = Deposition::orderby('created_at', 'DESC')->get();

        $bankAccounts = BankAccounts::all();


        $depositions = Deposition::orderBy('created_at', 'DESC')->get();

        $accountTotal = [];

        foreach ($depositions as $deposition) {
            $accountNumber = $deposition->account_number;
            $amount = $deposition->amount;
            $accountName = $deposition->account_name;
            $bankName = $deposition->bank_name;

            if (array_key_exists($accountNumber, $accountTotal)) {
                $accountTotal[$accountNumber]['total_amount'] += $amount;
            } else {
                $accountTotal[$accountNumber] = [
                    'bank_name' => $bankName,
                    'account_name' => $accountName,
                    'total_amount' => $amount,
                ];
            }
        }

        return view('balance_collected.index', compact('depositions', 'accountTotal', 'bankAccounts'));

    }

    public function bankaccountIndex(){
        $bankAccounts = BankAccounts::all();
        return view('bank_account.index', compact('bankAccounts'));
    }

    public function bankaccountCreate(Request $request)
    {
        // Validation
        $request->validate([
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
        ]);

         BankAccounts::create($request->all());

        // Redirect or return a response as needed
        return redirect()->route('bankaccount.index')->with('success', 'Category added successfully');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'depositer_name' => 'required|string|max:255',
            'bankaccount_id' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
        ]);

        $depositer_name =  $request->input('depositer_name');
        $bank_account_id =  $request->input('bankaccount_id');
        $amount =  $request->input('amount');

        $depositions = new Deposition();
        $depositions->amount =   $amount;
        $depositions->bank_account_id = $bank_account_id;
        $depositions->depositer_name = $depositer_name;
         $depositions->save();

        // Redirect or return a response as needed
        return redirect()->route('deposition.index')->with('success', 'Category added successfully');
    }


    public function withdraw(Request $request)
    {
        // Validation
        $request->validate([
            'withdrawer_name' => 'required|string|max:255',
            'bankaccount_id' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
        ]);

        $withdrawer_name =  $request->input('withdrawer_name');
        $bank_account_id =  $request->input('bankaccount_id');
        $amount =  $request->input('amount');

        $withdraws = new WithDraws();
        $withdraws->amount =   $amount;
        $withdraws->bank_account_id = $bank_account_id;
        $withdraws->withdrawer_name = $withdrawer_name;
        $withdrawer_name->save();

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
