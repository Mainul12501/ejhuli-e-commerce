<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;

class TagController extends AdminBaseController
{
    /**
     * This function loads the view of tags to create/list
     * @return view
     */
    public function index()
    {
        return view('admin.tags.tags');
    }

    /**
     * This function creates or updates the tags
     * @param AttributeRequest $attributeRequest
     * @return json
     */
    public function saveTag(TagRequest $tagRequest)
    {
        $tagName = $tagRequest->tag_name;

        Tag::updateOrCreate(['id'=>$tagRequest->editId],['tag'=>ucwords($tagName),'slug'=>Str::slug($tagName)]);

        return Response::json(['status'=>'success','message' => 'Tag saved successfylly !']);

    }

    /**
     * This function returns the list of tags
     * @param Request $listRequest
     * @return json
     * @throws \Exception
     */
    public function listTags(Request $listRequest)
    {
        $tagsData = Tag::listTags($listRequest);
        return datatables($tagsData)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the attribute with its associated categories
     * @param Request $deleteRequest
     * @return json
     */
    public function deleteTags(Request $deleteRequest)
    {
        Tag::where('id',$deleteRequest->tagId)->delete();
        return Response::json(['status'=>'success','message' => 'Tag deleted successfylly !']);
    }
}
