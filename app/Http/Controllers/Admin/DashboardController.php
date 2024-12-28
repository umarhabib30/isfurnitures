<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orderCount = Order::all()->count();
        $userCount = User::all()->count();
        $productCount = Product::all()->count();
        $grandTotal = Order::sum('grand_total');

        $data = [
            'active' => 'dashboard',
            'title' => 'Admin Dashboard',
            'orderCount' => $orderCount,
            'grandTotal' => $grandTotal,
            'productCount' => $productCount,
            'userCount' => $userCount,
        ];

        return view('admin.content.content', $data);
    }
}
