<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        return view('frontend.cart.cart', ['active' => 'cart', 'title' => 'Cart', 'heading' => $heading, 'description' => $description]);
    }

    public function add(Request $request)
    {
        $response = Cart::add($request->product_id, 1);
        return $response->json();
    }
    public function increase(Request $request)
    {
        $response = Cart::increase($request->id);
        return $response->json();
    }
    public function decrease(Request $request)
    {
    
        
        $response = Cart::decrease($request->id);
        return $response->json();
    }
    public function destroy(Request $request)
    {
        $response = Cart::remove($request->id);
        return $response->json();
    }
}
