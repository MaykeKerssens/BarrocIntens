<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = auth()->user()->company->user()->paginate(10);
        return view('customer.privacyData.index',[
            'users' => $users,
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
        $user = User::find($id);
        return view('customer.privacyData.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'phone' => 'required|string',
            'street' => 'required|string',
            'zip' => 'required|string',
            'city' => 'required|string',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->company->update([
            'phone' => $request->phone,
            'street' => $request->street,
            'zip' => $request->zip,
            'city' => $request->city,
        ]);

        return redirect()->route('privacyData.index')->with('message', 'Gegevens zijn succesvol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
