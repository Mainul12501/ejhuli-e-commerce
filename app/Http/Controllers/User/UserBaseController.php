<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Media;
use App\Models\Setting;
use App\Models\Story;
use View;

class UserBaseController extends Controller
{
    public function __construct()
    {
        $menuCategories = Category::where('categories.navigation',1)
            ->select('categories.id','categories.category','categories.category_slug','categories.icon_class')
            ->with('subCategories');

        $categories = Category::where('categories.status',1)
            ->select('categories.id','categories.category','categories.category_slug','categories.icon_class')
            ->with('subCategories');

        $categoriesSidebar = $categories->get()->toArray();
        $categoriesFilterDropDown = $categories->get()->toArray();

        $navigationMenus = $menuCategories->get()->toArray();

        $banners = Media::where(['type' => Media::BANNER,'status' => Media::ACTIVE])->get();

        $offerText = Setting::select('setting_value')->where('setting_name','offer_text')->first();

        $websiteLogo = Setting::select('setting_value')->where('setting_name','website_logo')->value('setting_value');

        $popup = Setting::select('setting_value')->where('setting_name','popup')->value('setting_value');

        $seoData = Setting::select('setting_value')->where('setting_name','seo')->value('setting_value');

        $stories = Story::where('status', Story::ACTIVE)->get();

        $otherImage1 = Media::select('file as other_img1')->where('type','other_img1')->value('other_img1');
        $otherImage2 = Media::select('file as other_img2')->where('type','other_img2')->value('other_img2');
        $otherImage3 = Media::select('file as other_img3')->where('type','other_img3')->value('other_img3');
        $otherImage4 = Media::select('file as other_img4')->where('type','other_img4')->value('other_img4');
        $otherImage5 = Media::select('file as other_img5')->where('type','other_img5')->value('other_img5');
        $otherImage6 = Media::select('file as other_img6')->where('type','other_img6')->value('other_img6');

        View::share('categoriesFilterDropDown',$categoriesFilterDropDown);
        View::share('menuCategories',$categoriesSidebar);
        View::share('navigationMenus',$navigationMenus);
        View::share('banners',$banners);
        View::share('offer_text',$offerText->setting_value);
        View::share('websiteLogo',$websiteLogo);
        View::share('popup',json_decode($popup));
        View::share('seoData',json_decode($seoData));
        View::share('stories', $stories);
        View::share('other_images', [
            $otherImage1,
            $otherImage2,
            $otherImage3,
            $otherImage4,
            $otherImage5,
            $otherImage6,
        ]);
    }
}
