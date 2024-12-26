<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $contacts = Contact::all();
        return view('admin.contactmessage.index', ['active' => 'contact', 'title' => 'Contact Us', 'contacts' => $contacts]);
    }
}
