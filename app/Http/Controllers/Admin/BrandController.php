<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\brands\BrandRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\BrandProduct;
use Illuminate\Http\Request;
use Response;

class BrandController extends AdminBaseController
{
    public function index()
    {
        return view('admin.brands.brands');
    }

    /**
     * This function creates/updates the brands
     * @param BrandRequest $brandRequest
     * @return json
     */
    public function saveBrands(BrandRequest $brandRequest)
    {
        $brands = Brand::saveBrands($brandRequest);
        return Response::json(['status'=>'success','message' => 'Brand saved successfully !']);
    }

    /**
     * This function returns all the brands
     * @param Request $request
     * @return json
     */
    public function getBrandList(Request $request)
    {
        $brands = Brand::getBrandList($request);
        return datatables($brands)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the brands
     * @param Request $request
     * @return json
     */
    public function deleteBrand(Request $request)
    {
        $productsFound = BrandProduct::where('brand_id',$request->brandId)->count();
        if ($productsFound == 0){
            Brand::deleteBrand($request);
            $message =  response()->json(['status'=>'success','message' => 'Brand deleted successfylly !']);
        }else {
            $message = response()->json(['status' => 'error', 'message' => 'This Brand assigned in some products!']);
        }
        return $message;
    }

    /**
     * This function changes the brand to be active or in-active
     * @param Request $statusRequest
     * @return json
     */
    public function changeBrandStatus(Request $statusRequest)
    {
        Brand::where(['id'=>$statusRequest->brandId])->update(['status'=>$statusRequest->updateStatus]);
        return Response::json(['status'=>'success','message'=>'Brand '.(($statusRequest->updateStatus==1?'activated':'de-activated')).' successfully !']);
    }
}
