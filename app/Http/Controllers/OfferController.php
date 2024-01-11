<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $products = Product::all(); // Haal alle beschikbare producten op
        return view('offers.create', ['companies' => $companies, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'costs' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
        ]);

        $offer = Offer::create([
            'date' => $request->date,
            'costs' => $request->costs,
            'company_id' => $request->company_id,
        ]);

        $offer->products()->attach($request->input('product_ids', []));

        $mailData = [
            'offerDate' => $offer->date,
            'offerCosts' => $offer->costs,
            'companyName' => $offer->company->name,
            'userEmail' => $offer->company->user->email,
            'productNames' => $offer->products->pluck('name')->toArray(),
        ];

        Mail::to($offer->company->user->email)
        ->send(new \App\Mail\OfferteCreate(
            $mailData['offerDate'],
            $mailData['offerCosts'],
            $mailData['companyName'],
            $mailData['userEmail'],
            $mailData['productNames']
        ));

        return redirect()->route('sales.index');
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
        $offer = Offer::find($id);
        return view('offers.edit')->with('offer', $offer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update([
            'accept' => $request->has('accept') && $request->input('accept') === '1',
        ]);

        return redirect()->route('sales.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->offerProducts()->delete();
        $offer->delete();
        return redirect()->route('sales.index');
    }
}