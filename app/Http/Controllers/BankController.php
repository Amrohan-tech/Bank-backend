<?php

namespace App\Http\Controllers;

use App\Models\bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(bank::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bank=Bank::create($request->all());

        return response()->json(['message' => 'account created successfully', 'bank' => $bank], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'age'=>'required|numeric',
            'mobile'=>'required'
        ]);
        $bank=Bank::create($request->all(),200);
        return response()->json(['message' => 'data sored successfully', 'bank' => $formData], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(bank $bank)
    {
        return response()->json($bank,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bank $bank)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'age'=>'required|numeric',
            'mobile'=>'required'
        ]);
    
        $bank->update($request->all());
    
        return response()->json(['message' => 'user of the bank updated successfully', 'bank' => $bank], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bank $bank)
    {
        //
    }
}
