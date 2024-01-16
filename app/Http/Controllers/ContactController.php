<?php

// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'description' => 'required|string',
        ]);

        // Verstuur het mailable
        Mail::to('ontvanger@example.com')->send(new ContactFormSubmitted(
            $request->input('company_name'),
            $request->input('email'),
            $request->input('subject'),
            $request->input('description')
        ));

        return redirect()->back()->with('message', 'Het formulier is succesvol verzonden!');
    }
}
