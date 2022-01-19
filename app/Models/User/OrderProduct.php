<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','product_id','quantity'];

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
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'order_id' => 'int',
        'product_id' => 'int',
        'quantity' => 'int',
    ];

    public static function getOrderProductDetail($orderId,$userId='')
    {
        return self::select('products.id','products.product_name','order_products.quantity','order_products.price','products.sku')
            ->join('orders','order_products.order_id','orders.id')
            ->join('products','order_products.product_id','products.id')
            ->where('order_products.order_id',$orderId)
            /**
             * Apply user id, when using this from customer order detail
             */
            ->when($userId, function ($userQuery) use ($userId) {
                return $userQuery->where('orders.user_id',$userId);
            })
            ->get();
    }
}
