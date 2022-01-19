<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\CategoryProduct;
use App\Models\Admin\Discount;
use App\Models\Admin\Product;
use App\Models\Setting;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;
use Response;

class CartController extends UserBaseController
{
    /**
     * This function loads the cart page and display the which are in cart
     * @return view
     */
    public function index()
    {
        return view('customer.cart.cart');
    }

    /**
     * This function add the products in cart
     * @param Request $createRequest
     * @return Json
     */
    public function createCart(Request $createRequest)
    {
        $getProductPrice = Product::select('regular_price','sale_price','product_slug')->where('id',$createRequest->productId)->first();
        $product = [
            'id' => $createRequest->productId,
            'name' => $createRequest->productName,
            'price' => (($getProductPrice->sale_price?$getProductPrice->sale_price:$getProductPrice->regular_price)),
            'quantity' => $createRequest->productQuantity,
            'attributes' => [
                'image' => $createRequest->productImage,
                'url' => route('getProductDetail',['productSlug' => $getProductPrice->product_slug])
            ],
        ];
        /**
         * Clear the cart conditions(coupons) if already coupon applied,
         * and someone tries to add product after that
         */
        \Cart::clearCartConditions();

        \Cart::add($product);
        return Response::json(['status'=>'success','message'=>'Product added to your cart !']);
    }

    /**
     * This function returns the products which are added in cart
     * @return Json
     */
    public function getCart()
    {
        $cart['items'] =  \Cart::getContent();
        $cart['items_count'] =   $cart['items']->count();
        $cart['sub_total'] = \Cart::getSubTotal();
        $cart['total'] = \Cart::getTotal();
        $cart['conditions'] = \Cart::getConditions();
        $cart['delivery_charge'] = Setting::getDeliveryCharge();
        return Response::json(['status'=>'success','data'=> $cart]);
    }

    /**
     * This function removed product from cart
     * @param Request $removeRequest
     * @return Json
     */
    public function removeCart(Request $removeRequest)
    {
        \Cart::remove($removeRequest->productId);
        /**
         * Clear all coupon codes which were applied
         */
        \Cart::clearCartConditions();
        \Cart::clearItemConditions($removeRequest->productId);
        $cart['items'] =  \Cart::getContent();
        return Response::json(['status'=>'success','message'=>'This Product removed from your cart !','data'=>$cart]);
    }

    /**
     * This function updates the cart quantity
     * @param Request $updateCart
     * @return Json
     */
    public function updateCart(Request $updateCart)
    {
        $newQty = (($updateCart->action == 'plus')?1:-1);
        \Cart::update($updateCart->productId,[
            'quantity' => $newQty,
        ]);
        return Response::json(['status'=>'success','message'=>'Your cart has been updated']);
    }

    /**
     * This function applies the coupon code to cart products
     * @param Request $couponRequest
     * @return Json
     */
    public function applyCouponCode(Request $couponRequest)
    {
        $couponCode = $couponRequest->couponCode;
        $productIdArray = [];
        $coupon = Discount::validateCouponCode($couponCode);

        if ($coupon){
            $couponToApplyOnCart = new CartCondition(array(
                'name' => $coupon->coupon_name,
                'type' => 'coupon',
                'target' => 'total',
                'value' => '-'.$coupon->discount.'%',
            ));
            $couponCategories = $coupon->categories;
            if ($couponCategories){
                $couponCategoriesArray = explode(',',$couponCategories);
                $cartItems = \Cart::getContent();
                $canBeApplied = false;
                foreach ($cartItems as $product){
                    $cartProductCategories = CategoryProduct::where('product_id', $product->id)->pluck('category_id')->toArray();
                    foreach($cartProductCategories as $cartCategory){
                        if (in_array($cartCategory, $couponCategoriesArray)){
                            $canBeApplied = true;
                            break;
                        }else{
                            $canBeApplied = false;
                        }
                    }
                    //print_r($cartProductCategories);
                }
                //print_r($couponCategoriesArray);
               // echo $canBeApplied ? 'can be applied': 'can not be applied';
               // die;
               // $cartProductCategories = array_unique($cartProductCategories);

                if ($canBeApplied){
                    \Cart::condition($couponToApplyOnCart);
                    $response = Response::json(['status' => 'success','message'=>'Coupon Code applied successfully']);
                }else{
                    $response = Response::json(['status' => 'error','message'=>'Coupon Code can not be applied on these category products']);
                }
            }else{
                /**
                 * If coupon code does not belong to any category, then apply it whole cart
                 */
                \Cart::condition($couponToApplyOnCart);
                $response = Response::json(['status' => 'success','message'=>'Coupon Code applied successfully']);
            }
        }else{
            $response = Response::json(['status' => 'error','message'=>'Sorry,Coupon is not valid or expired']);
        }
        return $response;
    }

    /**
     * This function checks if customer is logged or not
     * Otherwise user can't jump to checkout page
     * @return json
     */
    public function proceedToCheckout()
    {
        if (Auth::check()){
            $response = Response::json(['status' => 'loggedin']);
        }else{
            $response = Response::json(['status' => 'error','message' => 'You must be login to proceed']);
        }
        return $response;
    }
}
