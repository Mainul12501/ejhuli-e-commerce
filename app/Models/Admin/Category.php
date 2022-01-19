<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category', 'category_slug', 'description','icon_class','status','navigation'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'category' => 'string',
        'category_slug' => 'string',
        'description' => 'string',
        'status' => 'int',
        'navigation' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * This function creates/updates the category
     * @param $categoryRequest
     * @purpose admin
     * @return collection
     */
   public static function saveCategory($categoryRequest)
   {
       $categoryData = [
           'category' => ucwords($categoryRequest->category),
           'category_slug'=> Str::slug($categoryRequest->category),
           'icon_class' => $categoryRequest->categoryIcon,
           'navigation' => $categoryRequest->navigation,
           'description' => $categoryRequest->description
       ];
       return self::updateOrCreate(['id' => $categoryRequest->editId],$categoryData);
   }

    /**
     * This function returns all the categories by default active
     * @param $request
     * @purpose admin
     * @return collection
     */
   public static function getCategoryList($request)
   {
       $categoryStatus = $request->categoryStatus;
       $navigationStatus = $request->navigationStatus;
       $categorySearch = $request->categorySearch;
       return self::select('categories.id', 'categories.category as category_name','categories.description',
           'categories.category_slug','categories.status',
           'categories.icon_class','categories.navigation')
           ->when($categorySearch, function ($nameQuery) use ($categorySearch) {
               return $nameQuery->where('categories.category', 'like','%'. $categorySearch . '%');
           })
           ->where('categories.status',$categoryStatus)
           ->when($navigationStatus, function ($navQuery) use ($navigationStatus) {
               return $navQuery->where('categories.navigation',$navigationStatus);
           })
           ->orderBy('id', 'DESC')
           ->get();
   }

    /**
     * This function deletes the category means updates the status->3
     * @param $request
     * @purpose admin
     * @return collection
     */
   public static function deleteCategory($request)
   {
       return self::where('id',$request->categoryId)->update(['status'=>3]);
   }

  public function subCategories()
   {
       return $this->hasMany(SubCategory::class,'category_id','id');
   }

    /**
     * This is a relationship to get products of each category
     * This is called from home page
     * @purpose customer page
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
  public function categoryProducts()
  {
      return $this->hasMany(CategoryProduct::class,'category_id','id')
          ->join('products','category_products.product_id','products.id');

  }
  public function product()
  {
      return $this->hasMany(SubCategoryProduct::class,'sub_category_id','id');
  }

}
