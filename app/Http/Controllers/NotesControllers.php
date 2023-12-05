<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $notes = Note::all();
        return view('sales.index',[
            'users' => $users,
            'notes' => $notes,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $users = User::all(); 
        return view('notes.create', [
            'users' => $users,
            'companies' => $companies,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'date' => 'required|date',
            'company_id' => 'required|exists:companies,id',
        ]);

        Note::create([
            'note' => $request->note,
            'date' => $request->date,
            'company_id' => $request->company_id,
            'user_id' => Auth::id()
        ]);
        
        return redirect()->route('notes.index')->with('success', 'Notitie is succesvol toegevoegd.');
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
