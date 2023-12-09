<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Send the user to the Contact page
     */
    public function contactForm()
    {
        $user = [];
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            return view('contact', [
                'user' => $user,
            ]);
        }
        else{
            return view('contact');
        }
    }

    /**
     * Send the user to the Contact page
     */
    public function contactFormSend(Request $request)
    {
        dd('helloooo');
    }


}
