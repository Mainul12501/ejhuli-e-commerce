<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryProduct;
use App\Models\Admin\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\User\Review;
use Illuminate\Http\Request;
use Response;

class ProductController extends UserBaseController
{
    public function getProducts()
    {
        $categoriesWithSubCategories = Category::with(['subCategories'])->get()->toArray();
        $brandsWithCount = Brand::withCount('product')->get();
        return view('customer.products.products',[
            'categoriesWithSubCategories' => $categoriesWithSubCategories,'brandsWithCount'=>$brandsWithCount
        ]);
    }

    /**
     * This function finds all the product of a category/subcategory
     * @param $categorySlug
     * @param string $subCategorySlug
     * @param Request $request
     * @return json
     */
    public function getFilteredProduct($categorySlug,$subCategorySlug = '',Request $request)
    {
        $defaultFilter = $request->default_filter;
        $ratingFilter = $request->rating_filter;

        $products = Product::select('products.id','products.product_name','categories.category_slug',
            'products.product_slug','products.regular_price','products.sale_price','products.product_image',
            'products.product_image_1','products.average_rating','products.total_reviews',
            'products.sku')->distinct()
            ->join('category_products','products.id','category_products.product_id')
            ->join('categories','category_products.category_id','categories.id')
            ->join('sub_category_products','products.id','sub_category_products.product_id')
            ->join('sub_categories','sub_category_products.sub_category_id','sub_categories.id')
            ->where('categories.category_slug',$categorySlug)
            ->when($subCategorySlug, function ($subCategory) use ($subCategorySlug) {
                return $subCategory->where('sub_categories.slug', $subCategorySlug);
            })
            ->when($defaultFilter, function ($filterQuery) use ($defaultFilter) {
                if ($defaultFilter == 'popularity'){
                    return $filterQuery->orderBy('products.average_rating','DESC');
                }else if ($defaultFilter == 'new'){
                    return $filterQuery->orderBy('products.id','DESC');
                }else if ($defaultFilter == 'price_asc'){
                    return $filterQuery->orderBy('products.regular_price','ASC');
                }else if ($defaultFilter == 'price_desc'){
                    return $filterQuery->orderBy('products.regular_price','DESC');
                }
            })
            ->when($ratingFilter, function ($ratingsQuery) use ($ratingFilter) {
                return $ratingsQuery->where('products.average_rating','<=',$ratingFilter);
            })
            ->get();
        return Response::json(['status' => 'success','data' => $products]);
    }

    /**
     * This function just loades the page after entering search query
     * @return view
     */
   /* public function searchProduct()
    {
        $categoriesWithSubCategories = Category::with(['subCategories'])->get()->toArray();
        $brandsWithCount = Brand::withCount('product')->get();
        return view('customer.products.products-search',[
            'categoriesWithSubCategories' => $categoriesWithSubCategories,'brandsWithCount'=>$brandsWithCount
        ]);
    }*/

    /**
     * This function is a API to get the searched products
     * based on the the search query
     * @param $categorySlug
     * @param string $searchQuery
     * @param Request $request
     * @return json
     */
   /* public function getSearchedProducts($searchQuery,Request $request)
    {
        $products = [];
        $defaultFilter = $request->default_filter;
        $ratingFilter = $request->rating_filter;
        $getTagId = Tag::select('id')->where('tag','LIKE',"%$searchQuery%")->value('id');
        $taggedProductIds = ProductTag::whereRaw("FIND_IN_SET($getTagId,tag_ids)")->pluck('product_id');
        if ($taggedProductIds){
            $products = Product::select('products.id','product_name','product_name','product_slug','regular_price','sale_price','product_image',
                    'product_image_1','average_rating','total_reviews')
                ->join('category_products','products.id','category_products.product_id')
                ->whereIn('products.id',$taggedProductIds)
                ->when($defaultFilter, function ($filterQuery) use ($defaultFilter) {
                    if ($defaultFilter == 'popularity'){
                        return $filterQuery->orderBy('products.average_rating','DESC');
                    }else if ($defaultFilter == 'new'){
                        return $filterQuery->orderBy('products.id','DESC');
                    }else if ($defaultFilter == 'price_asc'){
                        return $filterQuery->orderBy('products.regular_price','ASC');
                    }else if ($defaultFilter == 'price_desc'){
                        return $filterQuery->orderBy('products.regular_price','DESC');
                    }
                })
                ->when($ratingFilter, function ($ratingsQuery) use ($ratingFilter) {
                    return $ratingsQuery->where('products.average_rating','<=',$ratingFilter);
                })
                ->get();
            return Response::json(['status' => 'success','data' => $products]);
        }

    }*/

    /**
     * This funtion loades the all tags,queries to input search
     * @param Request $request
     * @return json
     */
    public function getRelatedQueries(Request $request)
    {
        $search = $request->search;
        $queries = Tag::select('id','tag')
            ->when($search,function($query) use($search){
                return $query->where('tag','like',"%$search%");
             })->get()
            ->toArray();
        return Response::json(['status' => 'success','data' => $queries]);
    }

    /**
     * This function is a API to search the product via name or SKU
     * @param Request $request
     * @return json
     */
    public function productSearch(Request $request)
    {
        $search = $request->search;
        if ($search){
            $products = Product::select('id','product_name','product_slug')
                ->when($search,function($query) use($search){
                    return $query->where('product_name','like',"%$search%")
                        ->orWhere('sku','like',"%$search%");
                })->get();
            return Response::json(['status' => 'success','data' => $products]);
        }
    }

    /**
     * This is a function used to get the single product details
     * @param $productSlug
     * @return view
     */
    public function getProductDetail($productSlug)
    {
        $productTagNames = [];
        $productDetail = Product::getProductDetail($productSlug);
        $productTaggedIds = ProductTag::select('tag_ids')
            ->join('products','product_tags.product_id','products.id')
            ->where('products.product_slug',$productSlug)
             ->value('tag_ids');
        if ($productTaggedIds){
            $productTaggedIds = explode(',',$productTaggedIds);
            $tagNames = Tag::whereIn('id',$productTaggedIds)->pluck('tag');
            if ($tagNames){
                $productTagNames = $tagNames->toArray();
            }
        }
        if ($productDetail){
            $socialSharing = array(
                'url'=> route('getProductDetail',['productSlug'=>$productSlug]),
                'title'=>$productDetail->product_name,
                'tags'=>'#SHOPZEN #SHOPZEN Products'
            );
            return view('customer.product-detail.product-detail',['productDetail'=>$productDetail,
                'productTagNames' => $productTagNames,'socialSharing' => $socialSharing
            ]);
        }
        abort(404);
    }

    /**
     * This function gives the related products
     * in product detail page
     * @param $productId
     * @return json
     */
    public static function getRelatedProducts($productId)
    {
        $relatedProducts  = [];
        $relatedProducts = CategoryProduct::select('products.id','products.product_name','categories.category_slug',
            'products.product_slug','products.regular_price','products.sale_price','products.product_image',
            'products.product_image_1','products.average_rating','products.description','products.additional_info',
            'products.sku','products.total_reviews')
            ->join('products','category_products.product_id','products.id')
            ->join('categories','category_products.category_id','categories.id')
            ->where('products.id','!=',$productId)
            ->groupBy('products.id')
            ->get();
        return Response::json(['status' => 'success','data' => $relatedProducts]);

    }

    /**
     * This function returns all the latest revies of the product
     * @param Request $request
     * @return json
     */
    public function getProductReviews(Request $request)
    {
        $reviews = [];
        $productId = $request->productId;
        $reviews = Review::getProductReviews($productId);
        $response =  Response::json(['status' => 'success','data' => $reviews]);
        return $response;
    }

}
