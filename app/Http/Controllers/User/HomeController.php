<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryProduct;
use App\Models\Admin\Product;
use App\Models\Media;
use App\Models\User\Review;
use Response;

class HomeController extends UserBaseController
{
    public function index()
    {
        $topCategories = Category::where('status',1)
            ->select('category','category_slug','icon_class')
            ->get();
        $brands = Brand::where('status',1)->select('name','slug','logo')->get();
        return view('customer.main',['topCategories' => $topCategories,'brands'=>$brands]);
    }

    public function getFeaturedAndNewArrivalProducts($productType)
    {
        $newProducts = Product::select('*')
        ->whereRaw('FIND_IN_SET('.$productType.',product_display)')
        ->limit(10)
        ->orderBy('id','DESC')
        ->get();
        return Response::json(['status'=>'success','data'=>$newProducts]);
    }

    /**
     * This function is used to show the category row, and its products slides
     * @purpose used in mid of the home page
     * @return json
     */
    public function getCategoryWiseProducts()
    {
        $categoryProducts = Category::select('id','category','category_slug')
            ->with('categoryProducts:category_id,products.id,product_name,product_slug,sku,regular_price,sale_price,stock,product_image,product_image_1,product_image_2,description,average_rating,total_reviews')
            ->get();
        return Response::json(['status'=>'success','data'=>$categoryProducts]);
    }
}
