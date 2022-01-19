<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Response;

class CommonController extends AdminBaseController
{
    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::whereIn('category_id',$request->category)->select('id','subcategory')->get();
        return Response::json(['status'=>'success','data'=>$subCategories]);
    }

//    public function getAttributeOptions()
//    {
////       print_r($attributeId->all());die;
////        $attributeOptions = AttributeOption::select('id','option_name')
////            ->where('attribute_id',$attributeId)
////            ->get();
////        return Response::json(['status'=>'success','data'=>$attributeOptions]);
//    }

    public function storageLink()
    {
        Artisan::call('storage:link');
        Artisan::call('vendor:publish --tag=flare-config');
        echo "done";
    }


}
