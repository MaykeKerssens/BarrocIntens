<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $request->validate([
            'company_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $companyName = $request->input('company_name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $description = $request->input('description');

        // Save email to database, until email server is set-up
        Email::create([
            'company_name' => $companyName,
            'email' => $email,
            'subject' => $subject,
            'description' => ($request->input('description') ? $description : null),
        ]);

        // Send email
        // Mail::to('info@barrocIntens.com')->send(new ContactFormSubmitted($companyName, $email, $subject, $description));

        // You can add any additional logic here, e.g., redirect back with a success message
         return redirect()->back()->with('message', 'Email successvol verstuurd!');
    }


}
