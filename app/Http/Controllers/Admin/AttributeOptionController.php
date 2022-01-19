<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\attribute_options\AttributeOptionRequest;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeOption;
use Illuminate\Http\Request;
use Response;

class AttributeOptionController extends AdminBaseController
{
    /**
     * This function loads the view of attribute to create/list
     * @return view
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.attribute-options.attribute-options',['attributes' => $attributes]);
    }
    /**
     * This function creates/updates attribute options
     * @param AttributeOptionRequest $attributeOptionRequest
     * @return json
     */
    public function saveAttributeOption(AttributeOptionRequest $attributeOptionRequest)
    {
        $attributeOptions = [
            'option_name' => $attributeOptionRequest->attributeOption,
            'attribute_id' => $attributeOptionRequest->attributeName,
        ];
        $save = AttributeOption::updateOrCreate(['id'=>$attributeOptionRequest->editId],$attributeOptions);
        if ($save){
            return Response::json(['status'=>'success','message' => 'Attribute option saved successfylly !']);
        }
    }
    /**
     * This function returns the attribute options list
     * @param Request $listRequest
     * @return json
     */
    public function listAttributeOptions(Request $listRequest)
    {
        $attributeOptions = AttributeOption::listAttributeOptions($listRequest);
        if ($attributeOptions){
            return datatables($attributeOptions)->addIndexColumn()->make('true');
        }
    }

    /**
     * This function return filter option info
     * @param Request $infoRequest
     * @return json
     */
    public function getAttributeOptionInfo(Request $infoRequest)
    {
        $attributeOption = AttributeOption::findOrFail($infoRequest->attributeOptionId);
        if ($attributeOption){
            return Response::json(['status'=>'success','data' => $attributeOption]);
        }
    }

    /**
     * This function deletes the filter option
     * @param Request $deleteRequest
     * @return json
     */
    public function deleteAttributeOption(Request $deleteRequest)
    {
        $deleteOption = AttributeOption::where('id',$deleteRequest->attributeOptionId)->delete();
        if ($deleteOption){
            return Response::json(['status'=>'success','data' => 'Attribute Option deleted successfully !']);
        }
    }
}
