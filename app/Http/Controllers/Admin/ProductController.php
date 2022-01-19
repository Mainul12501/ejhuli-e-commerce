<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Requests\Admin\product\ProductRequest;
use App\Http\Requests\Admin\product\ProductUploadRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\BrandProduct;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryProduct;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use App\Models\Admin\SubCategoryProduct;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\User\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class ProductController extends AdminBaseController
{
    /**
     * This function loads the index page of products
     * @return view
     */
    public function index()
    {
        return view('admin.products.products');
    }

    /**
     * This function loads the view to add products
     * @return view
     */
    public function addProducts()
    {
        $brands = Brand::where('status',1)->select('id','name as brand_name')->get();
        $tags = Tag::all();
        return view('admin.products.add-products',['brands'=>$brands,'tags' => $tags]);
    }

    /**
     * This function creates/updates the product details
     * @param ProductRequest $productRequest
     * @return json
     */
    public function createProduct(ProductRequest $productRequest)
    {
        //print_r($productRequest->all());die;
        $productInfo = [
            'product_name' => $productRequest->productName,
            'sku' => $productRequest->productSku,
            'regular_price' => $productRequest->regularPrice,
            'sale_price' => $productRequest->salePrice,
            'product_slug' => $productRequest->productSlug,
            'stock' => $productRequest->productStock,
            'unit' => ucwords($productRequest->productUnit),
            'product_image' => $this->updateProductImage($productRequest),
            'product_image_1' => $this->updateProductImage1($productRequest),
            'product_image_2' => $this->updateProductImage2($productRequest),
            'product_display'=>implode(',',$productRequest->productDisplay),
            'description' => $productRequest->productDescription,
            'additional_info' => $productRequest->additionalInfo,

        ];
        DB::beginTransaction();
        $product = Product::updateOrCreate(['id'=>$productRequest->editId],$productInfo);

        /**
         * Tag the products
         */
        ProductTag::updateOrCreate(['product_id'=>$productRequest->editId],['product_id'=>$product->id,'tag_ids'=>implode(',',$productRequest->product_tags)]);
        /**
         * Find out the difference b/w new coming categories,and already exist categories
         * associated with product
         */
        $categoryAlready = CategoryProduct::where('product_id',$product->id)->pluck('category_id')->toArray();

        $newCategories = array_diff($productRequest->productCategory,$categoryAlready);
        $categoryToDelete = array_diff($categoryAlready,$productRequest->productCategory);

        /**
         * Finally save the categories and delete old categories
         */
        if (count($newCategories)){
            foreach ($newCategories as $category){
                $categoryProducts[] = [
                    'product_id' => $product->id,
                    'category_id' => $category,
                ];
            }
            CategoryProduct::insert($categoryProducts);

        }
        if ($categoryToDelete){
            CategoryProduct::whereIn('category_id',$categoryToDelete)->where('product_id',$product->id)->delete();
        }

        /**
         * Similarly, perform same logic for sub categories,filter options as in categories
         */
        if ($productRequest->productSubCategory){
            $subCategoryAlready = SubCategoryProduct::where('product_id',$product->id)->pluck('sub_category_id')->toArray();
            $newSubCategories = array_diff($productRequest->productSubCategory,$subCategoryAlready);
            $subCategoryToDelete = array_diff($subCategoryAlready,$productRequest->productSubCategory);
            if (count($newSubCategories)){
                foreach ($newSubCategories as $subCategory){
                    $suCategoryProducts[] = [
                        'product_id' => $product->id,
                        'sub_category_id' => $subCategory,
                    ];
                }
                SubCategoryProduct::insert($suCategoryProducts);
            }
            if ($subCategoryToDelete){
                SubCategoryProduct::whereIn('sub_category_id',$subCategoryToDelete)->where('product_id',$product->id)->delete();
            }
        }

        if ($productRequest->productBrands){
            $brandsAlready = BrandProduct::where('product_id',$product->id)->pluck('brand_id')->toArray();
            $newBrands = array_diff($productRequest->productBrands,$brandsAlready);
            $brandsToDelete = array_diff($brandsAlready,$productRequest->productBrands);
            if (count($newBrands)){
                foreach ($newBrands as $brand){
                    $brandProducts[] = [
                        'product_id' => $product->id,
                        'brand_id' => $brand,
                    ];
                }
                BrandProduct::insert($brandProducts);
            }
            if ($brandsToDelete){
                BrandProduct::whereIn('brand_id',$brandsToDelete)->where('product_id',$product->id)->delete();
            }
        }

        DB::commit();
        return Response::json(['status'=>'success','message' => 'Product saved successfully !']);
    }

    /**
     * This function returns the list of products
     * @param Request $listRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     * @return json
     */
    public function listProducts(Request $listRequest)
    {
        $productSearch = $listRequest->productSearch;
        $products = Product::select('id','product_name','sku','regular_price','sale_price','stock','unit','product_image','product_image_1','product_image_2','description',
            'additional_info','average_rating','status')
            ->where('status',1)
            ->when($productSearch,function ($searchQuery) use($productSearch){
                $searchQuery->where('product_name','like','%'.$productSearch.'%');
                $searchQuery->orWhere('sku','like','%'.$productSearch.'%');
            })->orderBy('id','DESC')->get();
        return datatables($products)->addIndexColumn()->make(true);
    }

    /**
     * This function creates the data and loads the view to edit products
     * @param $productId
     * @return view
     */
    public function editProduct($productId)
    {
        $productInfo = Product::findOrFail($productId);
        $brands = Brand::where('status',1)->select('id','name as brand_name')->get();
        $categoryIds = CategoryProduct::where('product_id',$productId)->pluck('category_id')->toArray();
        $categoryIds = implode(',',$categoryIds);
        $subCategoriesIds = SubCategoryProduct::where('product_id',$productId)->pluck('sub_category_id')->toArray();
        $subCategoriesIds = implode(',',$subCategoriesIds);
        $brandIds = BrandProduct::where('product_id',$productId)->pluck('brand_id')->toArray();
        $brandIds = implode(',',$brandIds);
        $tags = Tag::all();
        $taggedIds = ProductTag::select('tag_ids')->where('product_id',$productId)->pluck('tag_ids')->toArray();
        $taggedIds = implode(',',$taggedIds);
        return view('admin.products.add-products',['productInfo'=>$productInfo,'brands'=>$brands,
        'categoryIds'=>$categoryIds,'subCategoryIds'=>$subCategoriesIds,'brandIds'=>$brandIds,'tags' => $tags,
        'taggedIds' => $taggedIds]);
    }

    /**
     * This function deletes the product permanently from database
     * @param Request $deleteRequest
     * @return json
     */
    public function deleteProduct(Request $deleteRequest)
    {
        $productUploadPath =  Config::get('constants.paths.productUpload');
        DB::beginTransaction();
        CategoryProduct::whereIn('product_id',explode(',',$deleteRequest->productId))->delete();
        SubCategoryProduct::whereIn('product_id',explode(',',$deleteRequest->productId))->delete();
        BrandProduct::whereIn('product_id',explode(',',$deleteRequest->productId))->delete();
        $productImages = Product::where('id',$deleteRequest->productId)
            ->select('product_image','product_image_1','product_image_2')
            ->first();
        @unlink($productUploadPath.$productImages->product_image);
        @unlink($productUploadPath.$productImages->product_image_1);
        @unlink($productUploadPath.$productImages->product_image_2);
        Product::where('id',$deleteRequest->productId)->delete();
        DB::commit();
        return Response::json(['status'=>'success','message' => 'Product deleted successfully !']);
    }


    /**
     * This function uploads required product image
     * @param $productRequest
     * @scope local
     * @return string
     */
    public function updateProductImage($productRequest)
    {
        $productImg = $productRequest->file('productImage');
        if ($productRequest->hasFile('productImage')) {
            $productImageName = $productRequest->productSlug.'-'.$productImg->getClientOriginalName();
            $path = Config::get('constants.paths.productUpload');
            if ($productRequest->preProductImage !="null" && $productRequest->preProductImage){
                @unlink($path.$productRequest->preProductImage);
            }
            $uploadResult =  $productImg->move($path,$productImageName);
        }else{
            $productImageName = $productRequest->preProductImage;
        }
        return $productImageName;
    }
    /**
     * This function uploads 1nd product image
     * @param $productRequest
     * @scope local
     * @return string
     */
    public function updateProductImage1($productRequest)
    {
        $productImg = $productRequest->file('otherImage1');
        if ($productRequest->hasFile('otherImage1')) {
            $productImageName = $productRequest->productSlug.'-img-1-'.$productImg->getClientOriginalName();
            $path = Config::get('constants.paths.productUpload');
            if ($productRequest->preOtherImage1 !="null" && $productRequest->preOtherImage1){
                @unlink($path.$productRequest->preOtherImage1);
            }
            $uploadResult =  $productImg->move($path,$productImageName);
        }else{
            $productImageName = $productRequest->preOtherImage1;
        }
        return $productImageName;
    }

    /**
     * This function uploads 2nd product image
     * @param $productRequest
     * @scope local
     * @return string
     */
    public function updateProductImage2($productRequest)
    {
        $productImg = $productRequest->file('otherImage2');
        if ($productRequest->hasFile('otherImage2')) {
            $productImageName = $productRequest->productSlug.'-img-2-'.$productImg->getClientOriginalName();
            $path = Config::get('constants.paths.productUpload');
            if ($productRequest->preOtherImage2 !="null" && $productRequest->preOtherImage2){
                @unlink($path.$productRequest->preOtherImage2);
            }
            $uploadResult =  $productImg->move($path,$productImageName);
        }else{
            $productImageName = $productRequest->preOtherImage2;
        }
        return $productImageName;
    }

    /**
     * This function shows the detailed information of a uploaded product
     * @param $productId
     * @return view
     */
    public function getProductInfo($productId)
    {
        $productTags = [];
        $productItem  = Product::where(['id'=>$productId,'status'=>1])->first();
        $categoryIds = CategoryProduct::where('product_id',$productId)->pluck('category_id')->toArray();
        $categoryNames = Category::select('id','category')->whereIn('id',$categoryIds)->get();

        $subCategoriesId = SubCategoryProduct::where('product_id',$productId)->pluck('sub_category_id')->toArray();
        $subCategoryNames = SubCategory::select('id','subcategory')->whereIn('id',$subCategoriesId)->get();

        $brandIds = BrandProduct::where('product_id',$productId)->pluck('brand_id')->toArray();
        $brandNames = Brand::select('id','name as brand_name')->whereIn('id',$brandIds)->get();

        $taggedIds = ProductTag::where('product_id',$productId)->select('tag_ids')->value('tag_ids');
        if ($taggedIds){
            $productTags = Tag::getTags(explode(',',$taggedIds));
            if ($productTags){
                $productTags = $productTags->toArray();
            }
        }
       return view('admin.products.product-info',['productItem'=>$productItem,
           'categories'=>$categoryNames,'subCategories'=>$subCategoryNames,
           'brands'=>$brandNames,'productTags' =>$productTags
       ]);
    }

    /**
     * This function uploads products in bulk from CSV file
     * @param ProductUploadRequest $uploadRequest
     * @return json
     */
   public function uploadProduct(ProductUploadRequest $uploadRequest)
   {
       if ($uploadRequest->hasFile('product_file')) {
           $handle = fopen($_FILES['product_file']['tmp_name'], "r");
           $count = 0;
           DB::beginTransaction();
           while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
               $count++;
               if ($count == 1) {continue;}
               $categories = $data[6];
               $subCategories = $data[7];
               $brands = $data[8];
               $product = Product::create([
                   'product_name' => $data[0],
                   'sku' => $data[1],
                   'regular_price' =>$data[2],
                   'sale_price' =>  $data[3],
                   'product_slug' => Str::slug($data[0]),
                   'stock' => $data[4],
                   'unit' => ucwords($data[5]),
                   'product_image' => $data[10],
                   'product_image_1' => $data[11],
                   'product_image_2' => $data[12],
                   'product_display'=>  $data[9],
                   'description' => $data[13],
               ]);

               if ($categories){
                   $categories = explode(',',$categories);
                   foreach ($categories as $category){
                       CategoryProduct::create([
                           'product_id' => $product->id,
                           'category_id' => $category,
                       ]);
                   }
               }
               if ($subCategories){
                   $subCategories = explode(',',$subCategories);
                   foreach ($subCategories as $subCategory){
                        SubCategoryProduct::create([
                            'product_id' => $product->id,
                            'sub_category_id' => $subCategory,
                        ]);
                   }
               }
               if ($brands){
                   $brands = explode(',',$brands);
                   foreach ($brands as $brand){
                       BrandProduct::create([
                           'product_id' => $product->id,
                           'brand_id' => $brand,
                       ]);
                   }
               }
           }
           DB::commit();
           $this->uploadProductImagesInBulk($uploadRequest);
           return Response::json(['status'=>'success','message' => 'Products uploaded successfully !']);
       }
   }

    /**
     * This function uploads the product images in bulk
     * of that CSV which is being uploaded
     * @param $uploadRequest
     * @return bool
     */
   public function uploadProductImagesInBulk($uploadRequest)
   {
       $upload = false;
        if ($uploadRequest->hasFile('product_images')){
            $path = Config::get('constants.paths.productUpload');
            foreach ($uploadRequest->file('product_images') as $productImage){
                $imageName = $productImage->getClientOriginalName();
                $result = $productImage->move($path,$imageName);
                if ($result){
                    $upload = true;
                }
            }
        }
        return $upload;
   }

    /**
     * This function loads the review page for a product
     * @param $productId
     * @return View
     */
   public function productReviews($productId)
   {
       $product = Product::findOrFail($productId,['product_name']);
       return view('admin.products.product-reviews', compact('productId', 'product'));
   }

    /**
     * This function lists all the reviews of a product
     * @param $productId
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
   public function listProductReviews($productId)
   {
       $reviews = Review::getProductReviewss($productId);
       return datatables($reviews)->addIndexColumn()->make(true);
   }

    /**
     * This function deletes the product review
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   public function archiveProductReview(Request $request)
   {
       try{
           /*$review = Review::findOrFail($reviewId,['review_pictures']);
           $reviewPictures = $review->review_pictures;
           if ($reviewPictures){
               $reviewPictures = explode(',',$reviewPictures);
               $path = Config::get('constants.paths.product_review');
               foreach ($reviewPictures as $reviewPicture){
                   @unlink($path . $reviewPicture);
               }
          }*/
           $productId = $request->product_id;
           Review::where('id', $request->id)->update(['status' => Review::ARCHIVED]);
           Product::updateAverageRating($productId);
           Product::whereId($productId)->decrement('total_reviews');
           return ResponseHelper::successResponse(__('Review deleted successfully'));
       }catch (\Exception $exception) {
           return ResponseHelper::errorResponse($exception->getMessage(),201);
       }
   }
}
