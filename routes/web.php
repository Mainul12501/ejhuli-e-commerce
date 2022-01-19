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


Route::get('/foo', function () {
//    \Illuminate\Support\Facades\Artisan::call('storage:link');
//    return storage_path('/app/public/uploads/profile/customer/my.png');
//    return public_path('/');
    return base_path('/stroage');



});

//surjopay payment getway req
Route::post('/send-shurjopay-request', 'ShurjopayController@send')->name('send-money');
Route::post('/set-spdata-session', 'ShurjopayController@spSession')->name('sp-session');


Route::group(['prefix' => 'command'],function (){
    Route::get('clear', 'CommandController@clear')->name('clearCommand');
});
Route::get('/', 'HomeController@index')->name('viewHome');
Route::get('mail', 'CommandController@checkMail')->name('checkMail');

Route::group(['prefix' => 'common'],function (){
    Route::group(['prefix' => 'cart'], function () {
        Route::get('navigation', 'CartController@getCart')->name('getNavigationCart');
    });
});
Route::group(['prefix' => 'search'], function () {
    Route::get('get', 'ProductController@getRelatedQueries')->name('getRelatedQueries');
    Route::get('products', 'ProductController@productSearch')->name('productSearch');
});
Route::group(['prefix' => 'order-tracking'], function () {
    Route::get('/', 'TrackOrderController@index')->name('viewTrackOrder');
    Route::get('track', 'TrackOrderController@trackOrder')->name('trackOrder');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('related/{productId}', 'ProductController@getRelatedProducts')->name('getRelatedProducts');
    Route::get('reviews', 'ProductController@getProductReviews')->name('getProductReviews');
    Route::get('{productSlug}', 'ProductController@getProductDetail')->name('getProductDetail');
    Route::get('brand/{brandSlug}', 'ProductController@getProductsByBrands')->name('viewProductByBrand');
});

Route::group(['prefix' => 'products'], function () {
//    Route::get('search/{searchQuery}', 'ProductController@searchProduct')->name('searchProduct');
//    Route::get('searched/{searchQuery}', 'ProductController@getSearchedProducts')->name('getSearchedProducts');
    Route::get('filtered/{categorySlug}/{subCategorySlug?}', 'ProductController@getFilteredProduct')->name('getFilteredProduct');
    Route::get('{categorySlug}/{subCategorySlug?}', 'ProductController@getProducts')->name('viewProductByCatSubCat');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index')->name('viewCart');
    Route::post('create-cart', 'CartController@createCart')->name('createCart');
    Route::get('get-cart', 'CartController@getCart')->name('getCart');
    Route::post('remove-cart-item', 'CartController@removeCart')->name('removeCart');
    Route::post('update-cart', 'CartController@updateCart')->name('updateCart');
    Route::post('apply-coupon', 'CartController@applyCouponCode')->name('applyCouponCode');
    Route::get('proceed-to-checkout', 'CartController@proceedToCheckout')->name('proceedToCheckout');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'CheckoutController@index')->name('viewCheckout');
    Route::post('place-order', 'CheckoutController@placeOrder')->name('placeOrder');
    Route::get('order-completed', 'CheckoutController@orderCompleted')->name('orderCompleted');
});

Route::get('sign-in', 'LoginController@index')->name('viewLogin');

Route::post('check-login', 'LoginController@validateLogin')->name('validateLogin');

Route::get('sign-up', 'SignupController@index')->name('viewSignup');

Route::post('create-account', 'SignupController@createAccount')->name('createAccount');

Route::group(['prefix' => 'account'], function () {
    Route::get('verify/{token}', 'SignupController@accountVerify')->name('accountVerify');
});
Route::post('send-enquiry', 'ContactUsController@contactUs')->name('contactUs');
Route::group(['prefix' => 'password'], function () {
    Route::get('reset', 'PasswordController@resetPassword')->name('resetPassword');
    Route::post('verify', 'PasswordController@resetMyPassword')->name('resetMyPassword');
    Route::get('setup/{token}', 'PasswordController@setupPassword')->name('setupPassword');
    Route::post('update', 'PasswordController@updateNewPassword')->name('updateNewPassword');
});

Route::get('terms-and-conditions', 'PageController@termsAndConditions')->name('viewTermsAndConditions');
Route::get('about-us', 'PageController@aboutUs')->name('viewAboutUs');
Route::get('contact-us', 'PageController@contactUs')->name('viewContactUs');
Route::get('learn-to-request-payment', 'PageController@learnToRequestPayment')->name('learnToRequestPayment');

Route::get('get-home-page-products', 'HomeController@getCategoryWiseProducts')->name('getCategoryWiseProducts');

Route::get('get-arrival-featured-products/{type}', 'HomeController@getFeaturedAndNewArrivalProducts')->name('getFeaturedAndNewArrivalProducts');
Route::post('subscribe-newsletter', 'NewsletterController@subscribe')->name('subscribeNewsletter');


Route::group(['middleware' => ['isCustomer']], function () {
    Route::group(['prefix' => 'customer'], function () {

        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', 'DashboardController@index')->name('viewCustomerDashboard');
        });
        Route::group(['prefix' => 'notification'], function () {
            Route::get('/', 'NotificationController@index')->name('viewNotifications');
            Route::get('list', 'NotificationController@getNotifications')->name('getNotifications');
            Route::get('user-notification', 'NotificationController@getNotifications')->name('getUserNotifications');
            Route::get('all-notification', 'NotificationController@getAllNotifications')->name('getAllNotifications');
            Route::post('mark-read', 'NotificationController@markAsRead')->name('markAsRead');
            Route::post('mark-all-read', 'NotificationController@markAllAsRead')->name('markAllAsRead');
        });
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@index')->name('viewCustomerProfile');
            Route::post('update', 'ProfileController@updateProfile')->name('updateProfile');
        });

        Route::group(['prefix' => 'password'], function () {
            Route::get('/', 'PasswordController@index')->name('viewPasswordSetting');
            Route::patch('update', 'PasswordController@updatePassword')->name('updatePssword');
        });

        Route::group(['prefix' => 'transactions'], function () {
            Route::get('/', 'TransactionController@index')->name('recentTransactions');
            Route::get('detail', 'TransactionController@getTransactionDetail')->name('viewTransactionDetail');
            Route::post('add-money', 'TransactionController@addMoneyInWallet')->name('addMoneyInWallet');
            Route::get('get-recent', 'TransactionController@getRecentTransactions')->name('getRecentTransactions');
        });
        Route::group(['prefix' => 'addresses'], function () {
            Route::get('/', 'AddressController@index')->name('viewCustomerAddresses');
            Route::get('add', 'AddressController@addAddress')->name('addAddress');
            Route::get('edit/{addressId}', 'AddressController@editAddress')->name('editAddress');
            Route::post('create', 'AddressController@createUpdateAddress')->name('createAddress');
            Route::patch('update', 'AddressController@createUpdateAddress')->name('updateAddress');
            Route::delete('delete', 'AddressController@deleteAddress')->name('deleteAddress');
        });
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index')->name('viewCustomerOrders');
            Route::get('my-orders', 'OrderController@getMyOrders')->name('getMyOrders');
            Route::get('detail/{orderId}', 'OrderController@getOrderDetail')->name('orderDetail');
            //Route::get('mail/{orderNumber}', 'CheckoutController@send')->name('sendOrderPlacedMail');
            Route::get('invoice-download/{orderId}', 'OrderController@downloadInvoice')->name('downloadInvoice');
        });
        Route::group(['prefix' => 'reviews'], function () {
            Route::get('/', 'ProductReviewController@index')->name('viewReviews');
            Route::post('rate', 'ProductReviewController@rateProduct')->name('rateProduct');
        });
        Route::group(['prefix' => 'newsletter'], function () {
            Route::get('/', 'NewsletterController@index')->name('viewNewsLetterSetting');
            Route::post('change-setting', 'NewsletterController@changeNewsletterSetting')->name('changeNewsletterSetting');
        });
        Route::group(['prefix' => 'wallet-requests'], function () {
            Route::get('/', 'WalletController@index')->name('viewMyWalletRequests');
            Route::get('list', 'WalletController@getMyWalletRequests')->name('getMyWalletRequests');
            Route::get('info/{requestId}', 'WalletController@getWalletRequestInfo')->name('getWalletRequestInfo');
            Route::get('download/{requestId}', 'WalletController@downloadWalletRequestInfo')->name('downloadWalletRequestInfo');
        });
        Route::group(['prefix' => 'analytics'], function () {
            Route::get('/', 'AnalyticsController@index')->name('viewAnalytics');
        });
        Route::get('logout', 'LoginController@logout')->name('customerLogout');
        Route::get('pdf', 'PdfController@index')->name('pdf');
        Route::get('/resend-verify-email/{id}', 'DashboardController@resendMail')->name('resend-mail');
    });
});

