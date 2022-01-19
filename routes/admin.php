<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    /**
     * This route is loads the admin login page
     */
    Route::get('/', 'AdminLoginController@index')->name('adminLogin');
    Route::get('link-storage', 'CommonController@storageLink')->name('storageLink');
    /**
     * This route validates the admin login
     */
    Route::post('validateAdminLogin', 'AdminLoginController@validateAdminLogin')->name('validateAdminLogin');
    /**
     * These are the restricted routes that can be accessible after admin login
     */
    Route::group(['middleware' => ['auth']], function () {

        Route::group(['prefix' => 'common'], function () {
            Route::get('categories', 'CommonController@getAllCategories')->name('getAllCategories');
            Route::post('get-sub-category', 'CommonController@getSubCategories')->name('getSubCategories');
        });

        /**
         * This route is logout the admin
         */
        Route::get('logout', 'AdminLoginController@logout')->name('adminLogout');

        Route::group(['prefix' => 'dashboard'], function () {
            /**
             * This route is the admin dashboard after login
             */
            Route::get('/', 'AdminDashboardController@index')->name('viewAdminDashboard');
            Route::get('notify', 'AdminDashboardController@testNotification')->name('testNotification');
        });

        Route::group(['prefix' => 'profile'], function () {
            /**
             * This route loads the admin profile page
             */
            Route::get('/', 'ProfileController@index')->name('viewAdminProfile');
            /**
             * This route is a API to update admin profile
             */
            Route::post('update', 'ProfileController@updateProfile')->name('updateProfile');
        });

        /**
         * This routes loads the password setting page for admin
         */
        Route::get('password-setting', 'PasswordSettingController@index')->name('adminPasswordSetting');

        Route::group(['prefix' => 'categories'], function () {
            /**
             * This route is to load the categories in a view
             */
            Route::get('/', 'CategoryController@index')->name('viewCategory');
            /**
             * This route is a API to create category
             */
            Route::post('create', 'CategoryController@saveCategory')->name('saveCategory');
            /**
             * This route is a API to create category
             */
            Route::post('update', 'CategoryController@saveCategory')->name('updateCategory');
            /**
             * This rroute is a API to list the category
             */
            Route::get('list', 'CategoryController@getCategoryList')->name('saveCategory');
            /**
             * This route is API to delete the category
             */
            Route::delete('delete', 'CategoryController@deleteCategory')->name('deleteCategory');
        });
        Route::group(['prefix' => 'sub-categories'], function () {
            /**
             * This route is to load the sub categories in a view
             */
            Route::get('/', 'SubCategoryController@index')->name('viewSubCategory');
            /**
             * This route is a API to create sub category
             */
            Route::post('create', 'SubCategoryController@saveSubCategory')->name('saveSubCategory');
            /**
             * This route is a API to update sub category
             */
            Route::patch('update', 'SubCategoryController@saveSubCategory')->name('updateSubCategory');
            /**
             * This rroute is a API to list the sub category
             */
            Route::get('list', 'SubCategoryController@getSubCategoryList')->name('getSubCategoryList');
            /**
             * This rroute is a API to delete the sub category
             */
            Route::delete('delete', 'SubCategoryController@deleteSubCategory')->name('deleteSubCategory');
        });
        Route::group(['prefix' => 'brands'], function () {
            /**
             * This route is to load the brands in a view
             */
            Route::get('/', 'BrandController@index')->name('viewBrands');
            /**
             * This route is a API to create sub brands
             */
            Route::post('create', 'BrandController@saveBrands')->name('saveBrands');
            /**
             * This route is a API to update sub brands
             */
            Route::post('update', 'BrandController@saveBrands')->name('updateBrands');
            /**
             * This rroute is a API to list the brands
             */
            Route::get('list', 'BrandController@getBrandList')->name('getBrandList');
            /**
             * This rroute is a API to delete the sub brands
             */
            Route::delete('delete', 'BrandController@deleteBrand')->name('deleteBrand');
            /**
             * This rroute is a API to activate/de-activate the brand
             */
            Route::post('change-status', 'BrandController@changeBrandStatus')->name('changeBrandStatus');
        });


        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', 'TagController@index')->name('viewTags');
            Route::post('create', 'TagController@saveTag')->name('createTag');
            Route::patch('update', 'TagController@saveTag')->name('updateTag');
            Route::get('list', 'TagController@listTags')->name('listTags');
            Route::delete('delete', 'TagController@deleteTags')->name('deleteTags');
        });
        Route::group(['prefix' => 'newsletters'], function () {
            Route::get('/preview', 'NewsletterController@preview');
            Route::get('list', 'NewsletterController@getAllNewsletters')->name('getAllNewsletters');
            Route::group(['prefix' => 'subscribers'], function () {
                Route::get('/', 'NewsletterController@getSubscribers')->name('viewSubscribers');
                Route::get('list', 'NewsletterController@listSubscribers')->name('listSubscribers');
                Route::post('change-status', 'NewsletterController@changeSubscriberStatus')->name('changeSubscriberStatus');
            });
            Route::group(['prefix' => 'compose'], function () {
                Route::get('/', 'NewsletterController@composeNewsletter')->name('ViewComposeNewsletter');
                Route::post('compose-newsletter', 'NewsletterController@saveComposedNewsletters')->name('saveComposedNewsletters');
            });
        });
        Route::group(['prefix' => 'products'], function () {

            /**
             * This route is used to load product index page
             */
            Route::get('/', 'ProductController@index')->name('viewProducts');

            /*
             * This route is used to load add product form
             */
            Route::get('add', 'ProductController@addProducts')->name('addProducts');
            /**
             * This route is a API to create products
             */
            Route::post('create', 'ProductController@createProduct')->name('createProduct');
            /**
             * This route is a API to update products
             */
            Route::post('update', 'ProductController@createProduct')->name('updateProduct');
            /**
             * This route is a used to show edit product page with filled values
             */
            Route::get('edit/{productId}', 'ProductController@editProduct')->name('editProduct');
            /**
             * This route is a API to delete products
             */
            Route::delete('delete', 'ProductController@deleteProduct')->name('deleteProduct');
            /**
             * This route is a API to list products
             */
            Route::get('list', 'ProductController@listProducts')->name('listProducts');
            /**
             * This route is a API to show product detailed information
             */
            Route::get('info/{productId}', 'ProductController@getProductInfo')->name('getProductInfo');
            /**
             * This route is a API to upload products in bulk
             */
            Route::post('upload', 'ProductController@uploadProduct')->name('uploadProduct');
            Route::get('{productId}/reviews', 'ProductController@productReviews')->name('productReviews');
            Route::get('{productId}/list-reviews', 'ProductController@listProductReviews')->name('listProductReviews');
            Route::post('archive-review', 'ProductController@archiveProductReview')->name('archiveProductReview');

        });

        Route::group(['prefix' => 'discounts'], function () {
            Route::get('/', 'DiscountController@index')->name('viewDiscounts');
            Route::post('create', 'DiscountController@createDiscount')->name('createDiscount');
            Route::patch('update', 'DiscountController@createDiscount')->name('updateDiscount');
            Route::get('list', 'DiscountController@listDiscount')->name('listDiscount');
            Route::get('info', 'DiscountController@getDiscountInfo')->name('getDiscountInfo');
            Route::delete('delete', 'DiscountController@deleteDiscount')->name('deleteDiscount');
            Route::post('change-status', 'DiscountController@changeDiscountStatus')->name('changeDiscountStatus');
            Route::get('get-attributes', 'DiscountController@getAttrr')->name('getAttrr');
        });
        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', 'CustomerController@index')->name('viewCustomers');
            Route::get('list', 'CustomerController@getCustomerList')->name('getCustomerList');
        });
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index')->name('viewOrders');
            Route::get('list', 'OrderController@getOrdersList')->name('getOrdersList');
            Route::get('detail/{orderId}', 'OrderController@getOrderDetail')->name('getOrderDetail');
            Route::post('confirm', 'OrderController@confirmOrder')->name('confirmOrder');
            Route::post('cancel', 'OrderController@cancelOrder')->name('cancelOrder');
            Route::post('mark-delivered', 'OrderController@markDelivered')->name('markDelivered');
            Route::get('/mail', 'OrderController@mail')->name('mail');
        });
        Route::group(['prefix' => 'wallet'], function () {
            Route::get('/requests', 'WalletController@index')->name('viewWalletRequests');
            Route::get('list', 'WalletController@listWalletRequests')->name('listWalletRequests');
            Route::post('change-status', 'WalletController@statusWalletRequest')->name('statusWalletRequest');
        });
        Route::group(['prefix' => 'media'], function () {
            Route::group(['prefix' => 'banner'], function () {
                Route::get('/', 'MediaController@index')->name('viewBannerImages');
                Route::post('save', 'MediaController@saveBanner')->name('saveBanner');
                Route::get('list', 'MediaController@listBanner')->name('listBanner');
                Route::get('info', 'MediaController@getBannerInfo')->name('getBannerInfo');
                Route::delete('delete', 'MediaController@deleteBanner')->name('deleteBanner');
                Route::patch('change-status', 'MediaController@changeMediaStatus')->name('changeMediaStatus');
            });
            Route::group(['prefix' => 'others'], function () {
                Route::get('/', 'MediaController@viewOtherMedia')->name('viewOtherMedia');
                Route::get('list', 'MediaController@listOtherMedia')->name('listOtherMedia');
                Route::get('info', 'MediaController@getOtherMediaInfo')->name('getOtherMediaInfo');
                Route::post('save', 'MediaController@saveOtherMedia')->name('saveOtherMedia');
            });
        });
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', 'SettingController@viewSettings')->name('viewSetting');
            Route::post('update', 'SettingController@updateSettings')->name('updateSettings');
        });
        Route::group(['prefix' => 'popup'], function () {
            Route::get('/', 'PopupController@index')->name('viewPopup');
            Route::post('update', 'PopupController@updatePopup')->name('updatePopup');
        });
        Route::group(['prefix' => 'queries'], function () {
            Route::get('/', 'QueryController@index')->name('viewQueries');
            Route::get('list', 'QueryController@listQueries')->name('listQueries');
            Route::post('delete', 'QueryController@deleteQuery')->name('deleteQuery');
        });
        Route::group(['prefix' => 'stories'], function () {
            Route::get('/', 'StoryController@index')->name('viewStories');
            Route::post('save', 'StoryController@saveStory')->name('saveStory');
            Route::get('list', 'StoryController@listStories')->name('listStories');
            Route::delete('delete', 'StoryController@deleteStory')->name('deleteStory');
            Route::get('info', 'StoryController@getStoryInfo')->name('getStoryInfo');
        });
    });
});

