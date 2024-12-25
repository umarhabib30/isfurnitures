<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function service(){
    $heading = 'Shop the Best';
    $description = 'Explore top products, great prices, fast delivery.';
    return view('frontend.services.services', ['active' => 'services', 'title' => 'Service', 'heading' => $heading, 'description' => $description]);

   }
}
