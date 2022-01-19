<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    public $timestamps = false;
    const ACTIVE = 1;
    const ARCHIVED = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','product_id','user_id','rating','remark','review_pictures','review_date','status'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = ['review_date'];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'order_id' => 'int',
        'product_id' => 'int',
        'user_id' => 'int',
        'rating' => 'int',
        'remark' => 'string',
        'review_pictures' => 'string',
        'review_date' => 'datetime',
        'status' => 'int',
    ];

    public function getReviewDateAttribute($value)
    {
        return date("j F,  Y",strtotime($value));
    }
    public function getFirstNameAttribute($value)
    {
        return ucwords($value);
    }
    public function getLastNameAttribute($value)
    {
        return ucwords($value);
    }


    /**
     * This function rates the product
     * @param $request
     * @param $reviewImages
     * @return bool
     */
    public static function rateProduct($request,$reviewImages)
    {
        $userId = Auth::id();
        return self::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'user_id' => $userId,
            'rating' => $request->rating,
            'remark' => $request->review,
            'review_pictures' => $reviewImages ?? null,
            'review_date' => date('Y-m-d H:i:s')
        ]);
    }


    /**
     * This function checks if a product can be rated
     * or it is already rated for a order id
     * @param $orderId
     * @param $productId
     * @return bool
     */
    public static function productCanBeRated($orderId,$productId)
    {
        $userId = Auth::id();
        $alreadyRated =  self::select('id')->where(['order_id'=>$orderId,'product_id'=>$productId,'user_id'=>$userId])->first();
        if (!$alreadyRated){
            return true;
        }else{
            return false;
        }
    }

    /**
     * This function returns the product ids which are rated for
     * a user for a particular order Id
     * @param $orderId
     * @return array
     */
    public static function getMyRatedProducts($orderId)
    {
        $products = self::where(['order_id'=>$orderId])->pluck('product_id');
        if ($products){
            $products = $products->toArray();
        }
        return $products;
    }

    public function scopeProductReviewSelect($query)
    {
        return $query->select('reviews.id','reviews.product_id','reviews.rating','reviews.remark','reviews.review_date','reviews.status',
            'customers.first_name','customers.last_name','reviews.review_pictures','users.profile_pic')
            ->join('products','reviews.product_id','products.id')
            ->join('customers','reviews.user_id','customers.user_id')
            ->join('users','customers.user_id','users.id');
    }

    /**
     * This function returns the product reviews
     * for the public website
     * @param $productId
     * @return collection
     */
    public static function getProductReviews($productId)
    {
        return self::productReviewSelect()
            ->where('products.id',$productId)
            ->where('reviews.status',self::ACTIVE)
            ->orderBy('reviews.id')
            ->get();
    }
    /**
     * This function returns the product reviews
     * for the admin
     * @param $productId
     * @return collection
     */
    public static function getProductReviewss($productId)
    {
        return self::productReviewSelect()
            ->where('products.id',$productId)
            ->orderBy('reviews.id')
            ->get();
    }

    /**
     * This function returns all the reviews of a customer
     * @param $userId
     * @return collection
     */
    public static function getMyAllReviews($userId)
    {
        return self::select('orders.order_no','products.product_name','products.product_slug','reviews.rating','reviews.remark','reviews.review_date')
            ->join('orders','reviews.order_id','orders.id')
            ->join('products','reviews.product_id','products.id')
            ->where('reviews.user_id',$userId)
            ->orderBy('reviews.id','DESC')
            ->paginate(10);
    }
    /**
     * This is special function called accessor to change the value
     * @param $value
     * @return string
     */
    public function getProfilePicAttribute($value)
    {
        if ($value){
            return asset('storage/uploads/profile/customer/'. $value);
        }
        return asset('assets/images/avtar/default-customer-avtar.jpg');
    }


}
