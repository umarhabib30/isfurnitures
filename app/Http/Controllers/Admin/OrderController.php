<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::all();
        return view('admin.order.index', ['active' => 'order', 'title' => 'Orders', 'orders' => $orders]);
    }

    public function detail($id)
    {
        $orderItems = OrderItem::with('product')->with('order')->where('order_id', $id)->get();
        return view('admin.order.detail', ['active' => 'order', 'title' => 'Order Items', 'orderItems' => $orderItems]);
    }
}
