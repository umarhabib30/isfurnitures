<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout()
    {
        $heading = 'Checkout Now';
        $description = 'Complete your purchase securely and conveniently.';
        return view('frontend.checkout.checkout', [
            'active' => 'checkout',
            'title' => 'Checkout',
            'heading' => $heading,
            'description' => $description
        ]);
    }
}
