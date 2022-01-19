<?php

namespace App\Models\Admin;

use App\Models\User\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name','product_slug','sku','regular_price','sale_price',
        'stock','unit','product_image','product_image_1','product_image_2','product_display','description','additional_info',
        'average_rating','total_reviews','status'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'product_name' => 'string',
        'product_slug' => 'string',
        'sku' => 'string',
        'regular_price' => 'numeric',
        'sale_price' => 'numeric',
        'stock' => 'integer',
        'unit' => 'string',
        'product_image' => 'string',
        'product_image_1' => 'string',
        'product_image_2' => 'string',
        'description' => 'string',
        'additional_info' => 'string',
        'average_rating' => 'decimal:2',
        'total_reviews' => 'int',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * This function returns the single product page-details
     * @param $productSlug
     * @return collection
     */
    public static function getProductDetail($productSlug)
    {
        return self::select('id','product_name','product_slug','sku','regular_price','sale_price','stock','product_image',
            'product_image_1','product_image_2','description','additional_info','average_rating')
            ->where('status',1)
            ->where('product_slug',$productSlug)
            ->first();
    }

    /**
     * This function updates the average rating of the product
     * each time when a customer gives review
     * @param $productId
     * @return int
     */
    public static function updateAverageRating($productId)
    {
        $averageRating = Review::where(['product_id'=>$productId, 'status' => Review::ACTIVE])->avg('rating');
        return self::where('id',$productId)->update(['average_rating'=>$averageRating]);
    }

    /**
     * This function updates the total reviews count for a product
     * each time when a product is reviewed and rated
     * @param $productId
     * @return int
     */
    public static function updateReviewCount($productId)
    {
       return self::whereId($productId)->increment('total_reviews');
    }

}
