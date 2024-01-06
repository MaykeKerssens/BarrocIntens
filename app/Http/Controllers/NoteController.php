<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        $notes = Note::paginate(10);
        return view('sales.index',[
            'users' => $users,
            'notes' => $notes,
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
        $note = Note::findOrFail($id);
    
        // Check if product is allowed to be deleted
        if ($note->company->count() > 0) {
            return redirect()->route('notes.index')->with('message', 'Dit product kan niet verwijderd worden omdat het gekoppeld is aan een factuur.');
        }
        elseif ($note->user->count() > 0) {
            return redirect()->route('notes.index')->with('message', 'Dit product kan niet verwijderd worden omdat het gekoppeld is aan een reparatie aanvraag.');
        } else {
            // Delete product
            $note->delete();
            return redirect()->route('notes.index')->with('message', 'Product succesvol verwijderd.');
        }
    }
}    
