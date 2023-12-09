<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
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
        // $companyName = $request->input('company_name');
        // $email = $request->input('email');
        // $subject = $request->input('subject');
        // $description = $request->input('description');

        $companyName = "hello";
        $email = "hello@example.com";
        $subject = "tester subject";
        $description = "this is a description";

        // Send email
        // Mail::to('info@barrocIntens.com')->send(new ContactFormSubmitted($companyName, $email, $subject, $description));

        // You can add any additional logic here, e.g., redirect back with a success message
         return redirect()->back()->with('message', 'Email sent successfully!');
    }


}
