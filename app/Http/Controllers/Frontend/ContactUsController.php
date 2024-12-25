<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function contact()
    {
        $heading = 'Get in Touch';
        $description = 'Contact us for support, inquiries, feedback.';
        return view('frontend.contact.contact', ['active' => 'contacts', 'title' => 'Contact Us', 'heading' => $heading, 'description' => $description]);
    }
}
