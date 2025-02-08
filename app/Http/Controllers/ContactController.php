<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric',
            'subject' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store data in database
        $contact = Contact::create($request->all());

        // Send email to website owner
        Mail::to('wafulabrian86@gmail.com')->send(new ContactMail($contact));

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!'
        ]);
    }
}
