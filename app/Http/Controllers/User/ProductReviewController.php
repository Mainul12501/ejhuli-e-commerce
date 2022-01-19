<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Rating\ProductReviewRequest;
use App\Models\Admin\Product;
use App\Models\User\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class ProductReviewController extends UserBaseController
{
    /**
     * This function loads the view of customer review
     * @return View
     */
    public function index()
    {
        $reviews = Review::getMyAllReviews(Auth::id());
        return view('customer.product-rating.rate-product',['reviews' => $reviews]);
    }

    /**
     * This function rates the product,updates the avg rating.
     * @param ProductReviewRequest $reviewRequest
     * @return json
     */
    public function rateProduct(ProductReviewRequest $reviewRequest)
    {
        $reviewImages = $this->updateProductReviewImages($reviewRequest);
        if (Review::productCanBeRated($reviewRequest->order_id,$reviewRequest->product_id)){
             DB::beginTransaction();
             Review::rateProduct($reviewRequest,$reviewImages);
             Product::updateAverageRating($reviewRequest->product_id);
             Product::updateReviewCount($reviewRequest->product_id);
             DB::commit();
            $response =  Response::json(['status'=>'success','message' => 'Product rated successfully']);
        }else{
            $response =  Response::json(['status'=>'already_rated','message' => 'Product already rated']);
        }
        return $response;
    }

    /**
     * This function uploads required product image
     * @param $reviewRequest
     * @return string
     * @scope local
     */
    public function updateProductReviewImages($reviewRequest)
    {
        $pictures = '';
        if ($reviewRequest->hasFile('product_pictures')) {
            foreach ($reviewRequest->product_pictures as $picture) {
                $imageName = strtolower(Str::random(5).'.'.$picture->getClientOriginalExtension());
                $picture->storeAs('/public/uploads/products-reviews/', $imageName);
                $pictures .= $imageName.',';
            }
            $pictures = rtrim($pictures,',');
        }
        return $pictures;
    }

}
