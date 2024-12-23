<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'active' => 'dashboard',
            'title' => 'Admin Dashboard',
        ];
        return view('admin.content.content',$data);
    }
}
