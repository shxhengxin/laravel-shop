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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'page\PagesController@root')->name('root');
Auth::routes();

Route::redirect('/', '/products')->name('root');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['namespace' => 'email'],function (){
        Route::get('/email_verify_notice', 'EmailVerificationController@emailVerifyNotice')->name('email_verify_notice');//邮箱通知
        Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');//邮箱验证
        Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');//发送邮件
    });
    Route::group(['middleware'=>'email_verified'],function (){
        Route::group(['namespace'=>'user'],function (){
            Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');//地址列表
            Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');//创建地址页面
            Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');//新建地址
            Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');//编辑地址
            Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');//修改地址
            Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');//删除
        });
        Route::group(['namespace'=>'product'],function (){
            Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');//商品收藏
            Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');//商品取消收藏
            Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');//收藏列表
        });
        Route::group(['namespace'=>'cart'],function (){
            Route::get('cart', 'CartController@index')->name('cart.index');//查看购物车商品
            Route::post('cart', 'CartController@add')->name('cart.add');//加入购物车
            Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');
        });
        Route::group(['namespace'=>'order'],function (){
            Route::post('orders', 'OrdersController@store')->name('orders.store');
            Route::get('orders', 'OrdersController@index')->name('orders.index');
            Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');
            Route::post('orders/{order}/received', 'OrdersController@received')->name('orders.received'); //确认收货
            Route::get('orders/{order}/review', 'OrdersController@review')->name('orders.review.show');
            Route::post('orders/{order}/review', 'OrdersController@sendReview')->name('orders.review.store');
            Route::post('orders/{order}/apply_refund', 'OrdersController@applyRefund')->name('orders.apply_refund');
            Route::post('crowdfunding_orders', 'OrdersController@crowdfunding')->name('crowdfunding_orders.store');
        });
        Route::group(['namespace'=>'pay'],function (){
            Route::get('payment/{order}/alipay', 'PaymentController@payByAlipay')->name('payment.alipay');
            Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');
            Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');
            Route::post('payment/{order}/installment', 'PaymentController@payByInstallment')->name('payment.installment');
        });
        Route::group(['namespace'=>'coupon'],function (){
            Route::get('coupon_codes/{code}', 'CouponCodesController@show')->name('coupon_codes.show');
        });
        Route::group(['namespace'=>'install'],function (){
            Route::get('installments', 'InstallmentsController@index')->name('installments.index');
            Route::get('installments/{installment}', 'InstallmentsController@show')->name('installments.show');
            Route::get('installments/{installment}/alipay', 'InstallmentsController@payByAlipay')->name('installments.alipay');
            Route::get('installments/alipay/return', 'InstallmentsController@alipayReturn')->name('installments.alipay.return');
            Route::get('installments/{installment}/wechat', 'InstallmentsController@payByWechat')->name('installments.wechat');
        });

    });
});

// 后端回调不能放在 auth 中间件中
Route::post('installments/alipay/notify', 'installments\InstallmentsController@alipayNotify')->name('installments.alipay.notify');
Route::get('products', 'product\ProductsController@index')->name('products.index');//商品列表
Route::get('products/{product}', 'product\ProductsController@show')->name('products.show');//商品详情

Route::post('payment/wechat/refund_notify', 'pay\PaymentController@wechatRefundNotify')->name('payment.wechat.refund_notify');
Route::post('payment/alipay/notify', 'pay\PaymentController@alipayNotify')->name('payment.alipay.notify');
Route::post('payment/wechat/notify', 'pay\PaymentController@wechatNotify')->name('payment.wechat.notify');
Route::post('installments/wechat/notify', 'install\InstallmentsController@wechatNotify')->name('installments.wechat.notify');
Route::post('installments/wechat/refund_notify', 'InstallmentsController@wechatRefundNotify')->name('installments.wechat.refund_notify');


