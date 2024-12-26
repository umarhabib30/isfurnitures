<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = auth()->user()->id;

            if ($request->hasFile('image')) {
                $image = ImageHelper::saveImage($request->image, 'review');
            } else {
                $image = '';
            }

            $review = Review::create([
                'user_id' => $user,
                'product_id' => $request->productId,
                'notes' => $request->notes,
                'image' => $image,
            ]);

            if ($review) {
                alert()->success('Review created successfully');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            alert()->error('An error occurred while creating the review. Please try again.');
            return redirect()->back();
        }
    }
}
