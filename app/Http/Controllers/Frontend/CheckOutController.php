<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function orderStore(Request $request)
    {
        $order = Order::create([
            'firstname' => $request->firstName,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_no' => $request->phoneno,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'address' => $request->address,
            'order_note' => $request->order_note,
            'grand_total' => Cart::grandTotal(),
            'qty' => Cart::qty(),
        ]);
        foreach (Cart::products() as $product) {
            $price = $product['price'];
            $qty = $product['qty'];
            $total = $price * $qty;
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'total' => $total,
                'qty' => $qty
            ]);
        }

        if ($order) {
            Cart::clear();
        }
        return redirect()->route('home');
    }
}
