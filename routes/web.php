<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PagesController@index');

/*************************************************************
 * Test send email:
 *************************************************************/
// Route::get('test', function()
// {
//  Mail::send('welcome', [], function ($message)
//  {
//      $message->to('example@gmail.com', 'HisName')->subject('Welcome!');
//  });
// });
//

/**************************************************************
 * Điều hướng xác thực tài khoản
 *************************************************************/
Route::get('login', [
    'as' => 'auth.getLogin',
    'uses' => 'Auth\LoginController@showLoginForm',
    'middleware' => 'guest',
]);
Route::post('login', [
    'as' => 'auth.postLogin',
    'uses' => 'Auth\LoginController@login',
]);
Route::get('logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\LoginController@logout',
]);

// Registration Routes...
Route::get('register', [
    'as' => 'auth.getRegister',
    'uses' => 'Auth\RegisterController@showRegistrationForm',
]);
Route::post('register', [
    'as' => 'auth.postRegister',
    'uses' => 'Auth\RegisterController@register',
]);

// Password Reset Routes...
Route::get('password/reset/{token?}', [
    'as' => 'password.getPasswordReset',
    'uses' => 'Auth\PasswordController@showLinkRequestForm',
]);
Route::post('password/reset', [
    'as' => 'password.postPasswordReset',
    'uses' => 'Auth\PasswordController@sendResetLinkResponse',
]);
Route::post('password/email', [
    'as' => 'password.sendToEmail',
    'uses' => 'Auth\PasswordController@sendResetLinkEmail',
]);


/*************************************************************
 * Điều hướng đăng nhập bằng mạng xã hội:
 *************************************************************/
Route::get('auth/{provider}', [
    'as' => 'auth.social.redirect',
    'uses' => 'Auth\SocialController@redirectToProvider',
]);

Route::get('auth/{provider}/callback', [
    'as' => 'auth.social.callback',
    'uses' => 'Auth\SocialController@handleProviderCallback',
]);


/*************************************************************
 * Điều hướng trang tới trang bảng điều khiển của Admin.
 *************************************************************/
Route::get('/admin', [
    'as' => 'admin.dashboard',
    'uses' => 'Admin\PagesController@dashboard',
]);

/*************************************************************
 * Điều hướng trang quản trị đơn hàng
 *************************************************************/
Route::group(['prefix' => 'admin/don-hang'], function () {

    Route::get('/', [
        'as' => 'admin.order.index',
        'uses' => 'Admin\OrderManagerController@index',
    ]);
});

/*************************************************************
 * Quản trị danh mục sản phẩm
 *************************************************************/
Route::group(['prefix' => 'admin/danh-muc'], function () {

    Route::get('/', [
        'as' => 'admin.category.index',
        'uses' => 'Admin\CategoryManagerController@index',
    ]);

    Route::get('/chinh-sua/{id}', [
        'as' => 'admin.category.edit',
        'uses' => 'Admin\CategoryManagerController@edit',
    ]);

    Route::put('/chinh-sua/{id}', [
        'as' => 'admin.category.update',
        'uses' => 'Admin\CategoryManagerController@update',
    ]);

    Route::delete('/xoa-danh-muc/{id}', [
        'as' => 'admin.category.destroy',
        'uses' => 'Admin\CategoryManagerController@destroy',
    ]);

    Route::get('/them-moi', [
        'as' => 'admin.category.create',
        'uses' => 'Admin\CategoryManagerController@create',
    ]);

    Route::post('/them-moi', [
        'as' => 'admin.category.store',
        'uses' => 'Admin\CategoryManagerController@store',
    ]);

    Route::get('/danh-sach-loc', [
        'as' => 'admin.category.filter',
        'uses' => 'Admin\CategoryManagerController@filter',
    ]);
});

/*************************************************************
 *                        SẢN PHẨM
 *************************************************************/
Route::group(['prefix' => 'admin/san-pham'], function () {

    Route::get('/', [
        'as' => 'admin.product.index',
        'uses' => 'Admin\ProductManagerController@index',
    ]);

    Route::get('/them-moi', [
        'as' => 'admin.product.create',
        'uses' => 'Admin\ProductManagerController@create',
    ]);

    Route::post('/them-moi', [
        'as' => 'admin.product.store',
        'uses' => 'Admin\ProductManagerController@store',
    ]);

    Route::get('/chinh-sua/{id}', [
        'as' => 'admin.product.edit',
        'uses' => 'Admin\ProductManagerController@edit',
    ]);

    Route::put('/chinh-sua/{id}', [
        'as' => 'admin.product.update',
        'uses' => 'Admin\ProductManagerController@update',
    ]);

    Route::delete('/xoa-san-pham/{id}', [
        'as' => 'admin.product.destroy',
        'uses' => 'Admin\ProductManagerController@destroy',
    ]);

    Route::get('/danh-sach-loc', [
        'as' => 'admin.product.filter',
        'uses' => 'Admin\ProductManagerController@filter',
    ]);

    Route::put('/upload-hinh-anh/{id}', [
        'as' => 'admin.product.saveImage',
        'uses' => 'Admin\ImagesController@saveImageProduct',
    ]);

    Route::delete('/xoa-hinh-anh/{id}', [
        'as' => 'admin.product.removeImage',
        'uses' => 'Admin\ImagesController@removeImageProduct',
    ]);

});

/*************************************************************
 * Điều hướng các trang quản trị tài khoản
 *************************************************************/
Route::group(['prefix' => 'admin/tai-khoan'], function () {

    Route::get('/them-moi', [
        'as' => 'admin.account.create',
        'uses' => 'Admin\AccountManagerController@create',
    ]);

    Route::post('/them-moi', [
        'as' => 'admin.account.store',
        'uses' => 'Admin\AccountManagerController@store',
    ]);

    Route::get('/', [
        'as' => 'admin.account.index',
        'uses' => 'Admin\AccountManagerController@index',
    ]);

    Route::get('/danh-sach-loc', [
        'as' => 'admin.account.filter',
        'uses' => 'Admin\AccountManagerController@filter',
    ]);

    Route::get('/chi-tiet/{id}', [
        'as' => 'admin.account.show',
        'uses' => 'Admin\AccountManagerController@show',
    ]);

    Route::get('/chinh-sua/{id}', [
        'as' => 'admin.account.edit',
        'uses' => 'Admin\AccountManagerController@edit',
    ]);

    Route::put('/chinh-sua/{id}', [
        'as' => 'admin.account.update',
        'uses' => 'Admin\AccountManagerController@update',
    ]);

    Route::delete('/xoa-tai-khoan/{id}', [
        'as' => 'admin.account.destroy',
        'uses' => 'Admin\AccountManagerController@destroy',
    ]);
});

/**
 * Điều hướng các trang quản trị phần giao diện người dùng
 */
// Route::group(['prefix' => 'admin/giao-dien'], function(){

//  Route::get('/',[
//      'as' => 'admin.ui.index',
//      'uses' => 'Admin\UIManagerController@index'
//  ]);

// });


// Route::group(['prefix' => 'test'], function(){
// 	Route::resource('controller', 'PagesController@index');
// });

/*************************************************************
 * Điều hướng các trang người dùng.
 *************************************************************/
Route::get('/', 'PagesController@index');

Route::group(['prefix' => 'thanh-vien'], function () {
    // Route::get('app.account.');
});

/**
 *  Xử lý thanh toán khi đã đăng nhập
 */
Route::get('/dat-hang-va-thanh-toan{subfix?}', [
    'as' => 'app.order.checkout',
    'uses' => 'OrderController@insert',
]);

Route::post('/dat-hang-va-thanh-toan{subfix?}', [
    'as' => 'app.order.postCustomer',
    'uses' => 'OrderController@postCustomer',
]);

Route::get('/search', [
    'as' => 'app.product.search',
    'uses' => 'ProductController@search',
]);

Route::get('gio-hang{subfix?}', [
    'as' => 'app.cart.list',
    'uses' => 'Ajax\CartController@getList',
]);

Route::group(['prefix' => 'gio-hang'], function () {

    Route::put('them-san-pham{subfix?}', [
        'as' => 'app.cart.insert',
        'uses' => 'Ajax\CartController@insert',
    ]);

    Route::delete('xoa-san-pham{subfix?}', [
        'as' => 'app.cart.remove',
        'uses' => 'Ajax\CartController@remove',
    ]);

    Route::put('cap-nhat-so-luong{subfix?}', [
        'as' => 'app.cart.update',
        'uses' => 'Ajax\CartController@update',
    ]);

    Route::delete('huy-gio-hang{subfix?}', [
        'as' => 'app.cart.destroy',
        'uses' => 'Ajax\CartController@destroy',
    ]);

});

Route::get('/gioi-thieu{subfix?}', [
    'as' => 'app.page.about',
    'uses' => 'PagesController@about',
]);
Route::get('/lien-he{subfix?}', [
    'as' => 'app.page.contact',
    'uses' => 'PagesController@contact',
]);
Route::get('/san-pham-moi{subfix?}', [
    'as' => 'app.product.new',
    'uses' => 'ProductController@new',
]);
Route::get('/san-pham-noi-bat{subfix?}', [
    'as' => 'app.product.featured',
    'uses' => 'ProductController@featured',
]);

/**
 * Trang danh mục sản phẩm
 * Phải được đặt ở cuối cùng trong file này để không bị xung đột route.
 */
Route::get('/{categoryAlias}/{productAlias}{subfix?}', [
    'as' => 'app.product.detail',
    'uses' => 'ProductController@detail',
]);

Route::get('/{categoryAlias}{subfix?}', [
    'as' => 'app.product.category',
    'uses' => 'ProductController@category',
]);
