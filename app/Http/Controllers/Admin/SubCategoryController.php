<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\subcategory\SubCategoryRequest;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Response;

class SubCategoryController extends AdminDashboardController
{
    public function index()
    {   $categories = Category::select('id','category')->where('status',1)->get();
        return view('admin.sub-category.sub-categories',['categories' => $categories]);
    }

    /**
     * This function creates/updates the sub category
     * @param SubCategoryRequest $subCategoryRequest
     * @return json
     */
    public function saveSubCategory(SubCategoryRequest $subCategoryRequest)
    {
        $category = SubCategory::saveSubCategory($subCategoryRequest);
        if ($category){
            return Response::json(['status'=>'success','message' => 'Category saved successfylly !']);
        }
    }

    /**
     * This function returns all the sub categories
     * @param Request $request
     * @return json
     */
    public function getSubCategoryList(Request $request)
    {
        $subCategories = SubCategory::getSubCategoryList($request);
        return datatables($subCategories)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the sub category
     * @param Request $request
     * @return json
     */
    public function deleteSubCategory(Request $request)
    {
        $delete = SubCategory::deleteSubCategory($request);
        if ($delete){
            return response()->json(['status'=>'success','message' => 'Sub Category deleted successfylly !']);
        }
    }

}
