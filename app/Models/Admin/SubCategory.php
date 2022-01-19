<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'subcategory','slug', 'description'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'category_id' => 'int',
        'subcategory' => 'string',
        'slug' => 'string',
        'description' => 'string',
    ];

    /**
     * This function creates/updates the category
     * @param $categoryRequest
     * @return collection
     */
    public static function saveSubCategory($subCategoryRequest)
    {
        $subCategoryData = [
            'category_id' => $subCategoryRequest->category,
            'subcategory' => ucwords($subCategoryRequest->subCategory),
            'slug' => Str::slug($subCategoryRequest->subCategory),
            'description' => $subCategoryRequest->description
        ];
        return self::updateOrCreate(['id' => $subCategoryRequest->editId], $subCategoryData);
    }

    /**
     * This function returns all the sub categories
     * @param $request
     * @return collection
     */
    public static function getSubCategoryList($request)
    {
        $subCategorySearch = $request->subCategorySearch;
        $categorySelect = $request->categorySelect;
        return self::select('sub_categories.id','sub_categories.subcategory as subcategory','sub_categories.category_id','categories.category as category_name','sub_categories.slug',
           'sub_categories.description')
            ->join('categories','sub_categories.category_id','categories.id')
            ->when($subCategorySearch, function ($nameQuery) use ($subCategorySearch) {
                return $nameQuery->where('sub_categories.subcategory', 'like','%'. $subCategorySearch . '%');
            })
            ->when($categorySelect, function ($selectQuery) use ($categorySelect) {
                return $selectQuery->where('categories.id', $categorySelect);
            })
            ->orderBy('id', 'DESC')
            ->get();
    }
    /**
     * This function deletes the sub category
     * @param $request
     * @return collection
     */
    public static function deleteSubCategory($request)
    {
        return self::where('id',$request->subCategoryId)->delete();
    }
}
