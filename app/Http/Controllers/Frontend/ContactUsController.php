<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function contact()
    {
        $heading = 'Get in Touch';
        $description = 'Contact us for support, inquiries, feedback.';
        return view('frontend.contact.contact', ['active' => 'contacts', 'title' => 'Contact Us', 'heading' => $heading, 'description' => $description]);
    }

    public function store(Request $request)
    {
        try {
            $contact = Contact::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            if ($contact) {
                alert()->success('success', 'Thanks For Contact Us');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            alert()->error('error', $e->getMessage() );
            return redirect()->back();
        }
    }
}
