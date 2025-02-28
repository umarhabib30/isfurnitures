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

            if (!$user) {
                alert()->error('Please login before you can leave a review');
                return redirect()->back();
            }
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
                'rating' => $request->rating,
            ]);

            if ($review) {
                alert()->success('Review Submitted successfully');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            alert()->error('An error occurred while creating the review. Please try again.');
            return redirect()->back();
        }
    }
}
