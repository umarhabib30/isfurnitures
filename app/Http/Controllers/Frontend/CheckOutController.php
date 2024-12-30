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
        if (Cart::qty() <= 0) {
            alert()->error('Your cart is empty!', 'Please add some products to your cart before placing an order.');
            return redirect()->back();
        }
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
        if (Cart::qty() <= 0) {
            alert()->error('Your cart is empty!', 'Please add some products to your cart before placing an order.');
            return redirect()->back();
        }
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
        alert()->success('Your order has been successfully placed!', 'Thank you for shopping with us. We will get in touch soon.');
        // return redirect()->route('home');
        return redirect()->route('email.detail', ['id' => $order->id]);
    }
}
