<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\attributes\AttributeRequest;
use App\Models\Admin\Attribute;
use Illuminate\Http\Request;
use Response;

class AttributeController extends AdminBaseController
{
    /**
     * This function loads the view of filter to create/list
     * @return view
     */
    public function index()
    {
        return view('admin.attributes.attributes');
    }

    /**
     * This function creates the attributes
     * @param AttributeRequest $attributeRequest
     * @return json
     */
    public function saveAttribute(AttributeRequest $attributeRequest)
    {
        $attributeName = $attributeRequest->attributeName;

         Attribute::updateOrCreate(['id'=>$attributeRequest->editId],
            ['attribute_name'=>$attributeName]);

        return Response::json(['status'=>'success','message' => 'Attribute saved successfylly !']);

    }

    /**
     * This function returns the list of attributes with its categories
     * @param Request $listRequest
     * @return json
     * @throws \Exception
     */
    public function listAttributes(Request $listRequest)
    {
        $attributeData = Attribute::getAllAttributes($listRequest);
        return datatables($attributeData)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the attribute with its associated categories
     * @param Request $deleteRequest
     * @return json
     */
    public function deleteAttributes(Request $deleteRequest)
    {
        Attribute::where('id',$deleteRequest->attributeId)->delete();
        return Response::json(['status'=>'success','message' => 'Attribute deleted successfylly !']);
    }
}
