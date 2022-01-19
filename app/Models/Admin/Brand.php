<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','logo','description', 'status'];

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
        'name' => 'string',
        'slug' => 'string',
        'logo' => 'string',
        'description' => 'string',
        'status' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * This function creates/updates product brands
     * @param $brandRequest
     * @return Collection
     */
    public static function saveBrands($brandRequest)
    {
        $brandLogo = $brandRequest->file('brandLogo');
        if ($brandRequest->hasFile('brandLogo')) {
            $brandImageName =  $brandRequest->brandSlug.'-'.$brandLogo->getClientOriginalName();
            $path = storage_path('app/public/uploads/brands/');
            if ($brandRequest->preBrandLogo !="null" && $brandRequest->preBrandLogo){
                @unlink($path.$brandRequest->preBrandLogo);
            }
            $brandLogo->move($path, $brandImageName);
        }else{
            $brandImageName = $brandRequest->preBrandLogo;
        }
        $brandData = [
            'name' => ucwords($brandRequest->brandName),
            'slug'=> $brandRequest->brandSlug,
            'logo' => $brandImageName,
            'description' => $brandRequest->description
        ];
        return self::updateOrCreate(['id' => $brandRequest->editId],$brandData);
    }

    /**
     * This function returns all the brands
     * @param $request
     * @purpose admin
     * @return collection
     */
    public static function getBrandList($request)
    {
        $brandStatus = $request->brandStatus;
        $brandNameSearch = $request->brandNameSearch;
        return self::select('id','name','slug','logo','description','status')
            ->when($brandNameSearch, function ($nameQuery) use ($brandNameSearch) {
                return $nameQuery->where('name', 'like','%'. $brandNameSearch . '%');
            })
            ->when($brandStatus, function ($statusQuery) use ($brandStatus) {
                 $statusQuery->where('status',$brandStatus);
            })
            ->orderBy('id', 'DESC')
            ->get();
    }
    /**
     * This function deletes the brand
     * @param $request
     * @purpose admin
     * @return collection
     */
    public static function deleteBrand($request)
    {
        @unlink(storage_path('app/public/uploads/brands/').$request->logo);
        return self::where('id',$request->brandId)->delete();
    }

    public function product()
    {
        return $this->hasMany(BrandProduct::class,'brand_id','id');
    }

}
