<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($id)
    {

        $order = Order::find($id);
        $items = OrderItem::where('order_id', $id)->get();

        if ($order) {
            $email = 'mumarhabibrb102@gmail.com';


            $mailData = [
                'title' => 'Mail from Sofa Hub',
                'order' => $order,
                'items' => $items,
            ];

            Mail::to($email)->send(new OrderMail($mailData));


            alert()->success('Your order has been successfully placed!', 'Thank you for shopping with us. We will get in touch soon.');
            return redirect()->route('home');
        }
    }
}
