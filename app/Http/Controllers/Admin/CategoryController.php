<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Requests\Admin\category\CategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Response;

class CategoryController extends AdminDashboardController
{
    public function index()
    {
        $categories = Category::all();
        $categoriesIcons = Helper::iconLibrary();
        return view('admin.category.categories',['categories' => $categories,'categoriesIcons' => $categoriesIcons]);
    }

    /**
     * This function creates/updates the category
     * @param CategoryRequest $categoryRequest
     * @return json
     */
    public function saveCategory(CategoryRequest $categoryRequest)
    {
        $category = Category::saveCategory($categoryRequest);
        if ($category){
            return Response::json(['status'=>'success','message' => 'Category saved successfylly !']);
        }
    }

    /**
     * This function returns all the categories by default active
     * @param Request $request
     * @return json
     */
    public function getCategoryList(Request $request)
    {
        $categories = Category::getCategoryList($request);
        return datatables($categories)->addIndexColumn()->make(true);
    }

    /**
     * This function deletes the category means updates the status->3
     * @param Request $request
     * @return json
     */
    public function deleteCategory(Request $request)
    {
        $delete = Category::deleteCategory($request);
        if ($delete){
            return response()->json(['status'=>'success','message' => 'Category deleted successfylly !']);
        }
    }

}
