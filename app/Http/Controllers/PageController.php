<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contact()
    {
        $user = [];
        // Check if the user is logged in
        if (Auth::check()) {
            // Retrieve the current user's data
            $user = Auth::user();
            return view('contact', [
                'user' => $user,
            ]);
        }
        else{
            return view('contact');
        }

    }
}
