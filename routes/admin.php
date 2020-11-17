<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin',
    'HomeController@index')
    ->name('admin_home');

/***********************************
 * *******   Buyers *************
 **********************************/

Route::get('/admin/buyers',
    'BuyerController@index')
    ->name('admin_buyer_index');

Route::get('/admin/buyers-content',
    'BuyerController@indexContent')
    ->name('admin_buyer_index_content');

Route::get('/admin/buyers/{buyerId}/update',
    'BuyerController@update')
    ->name('admin_buyer_update');

Route::post('/admin/buyers/{buyerId}/update',
    'BuyerController@updatePost')
    ->name('admin_buyer_update_post');

Route::get('/admin/buyers/{buyerId}/updateAddress',
    'BuyerController@updateAddress')
    ->name('admin_buyer_updateAddress');

Route::get('/admin/buyers/{buyerId}/active',
    'BuyerController@active')
    ->name('admin_buyer_active');

/***********************************
 * *******   User *************
 **********************************/

Route::get('/admin/user',
    'UserController@index')
    ->name('admin_user_index');

Route::get('/admin/user-content',
    'UserController@indexContent')
    ->name('admin_user_index_content');

Route::get('/admin/user/create',
    'UserController@create')
    ->name('admin_user_create');

Route::post('/admin/user/create',
    'UserController@createPost')
    ->name('admin_user_create_post');

Route::get('/admin/user/{userId}/update',
    'UserController@update')
    ->name('admin_user_update');

Route::post('/admin/user/{userId}/update',
    'UserController@updatePost')
    ->name('admin_user_update_post');

Route::get('/admin/user/{userId}/active',
    'UserController@active')
    ->name('admin_user_active');

Route::get('/admin/user/{userId}/delete',
    'UserController@delete')
    ->name('admin_user_delete');

/***********************************
 * *******   Providers *************
 **********************************/
Route::get('/admin/provider',
    'ProviderController@index')
    ->name('admin_provider_index');

Route::get('/admin/provider-content',
    'ProviderController@indexContent')
    ->name('admin_provider_index_content');

Route::get('/admin/provider/create',
    'ProviderController@create')
    ->name('admin_provider_create');

Route::post('/admin/provider/create',
    'ProviderController@createPost')
    ->name('admin_provider_create_post');

Route::get('/admin/provider/{providerId}/update',
    'ProviderController@update')
    ->name('admin_provider_update');

Route::post('/admin/provider/{providerId}/update',
    'ProviderController@updatePost')
    ->name('admin_provider_update_post');

Route::get('/admin/provider/{providerId}/active',
    'ProviderController@active')
    ->name('admin_provider_active');


/***********************************
 * *******   Products *************
 **********************************/
Route::get('/admin/products',
    'ProductController@index')
    ->name('admin_products_index');

Route::get('/admin/products-content',
    'ProductController@indexContent')
    ->name('admin_products_index_content');

Route::get('/admin/product/create',
    'ProductController@create')
    ->name('admin_product_create');

Route::post('/admin/product/create',
    'ProductController@createPost')
    ->name('admin_product_create_post');

Route::get('/admin/product/{productId}/update',
    'ProductController@update')
    ->name('admin_product_update');

Route::post('/admin/product/{productId}/update',
    'ProductController@updatePost')
    ->name('admin_product_update_post');

Route::get('/admin/product/{productId}/active',
    'ProductController@active')
    ->name('admin_product_active');

/***********************************
 * *******   Variants *************
 **********************************/

Route::get('/admin/product/{productId}/variants',
    'VariantController@index')
    ->name('admin_product_variants');

Route::get('/admin/product/{productId}/variants-content',
    'VariantController@indexContent')
    ->name('admin_product_variants_content');

Route::get('/admin/product/{productId}/variant/create',
    'VariantController@create')
    ->name('admin_product_variants_create');

Route::get('/admin/product/variant/{variantId}/update',
    'VariantController@update')
    ->name('admin_product_variants_update_images');

Route::post('/admin/product/variant/{variantId}/update',
    'VariantController@updatePost')
    ->name('admin_product_variants_update_post');

Route::post('/admin/product/variant/create',
    'VariantController@createPost')
    ->name('admin_product_variants_create_post');

Route::get('/admin/product/variant/{variantId}/active',
    'VariantController@active')
    ->name('admin_product_variants_active');

Route::get('/admin/product/{productId}/load-images',
    'VariantController@loadImages')
    ->name('admin_variants_load_images');

Route::post('/admin/product/variant/save-image',
    'VariantController@saveImage')
    ->name('admin_variants_save_image');

/***********************************
 * *******   Category *************
 **********************************/
Route::get('/admin/category',
    'CategoryController@index')
    ->name('admin_category_index');

Route::get('/admin/category-content',
    'CategoryController@indexContent')
    ->name('admin_category_index_content');

Route::get('/admin/category/create',
    'CategoryController@create')
    ->name('admin_category_create');

Route::post('/admin/category/create',
    'CategoryController@createPost')
    ->name('admin_category_create_post');

Route::get('/admin/category/{categoryId}/update',
    'CategoryController@update')
    ->name('admin_category_update');

Route::post('/admin/category/{categoryId}/update',
    'CategoryController@updatePost')
    ->name('admin_category_update_post');

Route::get('/admin/category/{categoryId}/active',
    'CategoryController@active')
    ->name('admin_category_active');

/***********************************
 * *******   Purchase *************
 **********************************/
Route::get('/admin/purchase',
    'PurchaseController@index')
    ->name('admin_purchase_index');

Route::get('/admin/purchase-content',
    'PurchaseController@indexContent')
    ->name('admin_purchase_index_content');

Route::get('/admin/{purchaseId}/purchase-detail',
    'PurchaseController@detailPurchase')
    ->name('admin_purchase_detail');

/***********************************
 * *******   Contact messages *************
 **********************************/

Route::get('/admin/contact-messages',
    'ContactMessagesController@index')
    ->name('admin_contactMessages_index');

Route::get('/admin/contact-messages-content',
    'ContactMessagesController@indexContent')
    ->name('admin_contactMessages_index_content');

/***********************************
 * *******  Promotions *************
 **********************************/

Route::get('/admin/promotion',
    'PromotionController@index')
    ->name('admin_promotion_index');

Route::get('/admin/promotion-content',
    'PromotionController@indexContent')
    ->name('admin_promotion_index_content');

Route::get('/admin/promotion/create',
    'PromotionController@create')
    ->name('admin_promotion_create');

Route::post('/admin/promotion/create',
    'PromotionController@createPost')
    ->name('admin_promotion_create_post');

Route::get('/admin/promotion/{promotionId}/update',
    'PromotionController@update')
    ->name('admin_promotion_update');

Route::post('/admin/promotion/{promotionId}/update',
    'PromotionController@updatePost')
    ->name('admin_promotion_update_post');

Route::get('/admin/promotion/{promotionId}/active',
    'PromotionController@active')
    ->name('admin_promotion_active');

/***********************************
 * *******  Payment_Method *************
 **********************************/

Route::get('/admin/payment_Method',
    'PaymentMethodController@index')
    ->name('admin_payment_method_index');

Route::get('/admin/payment_Method-content',
    'PaymentMethodController@indexContent')
    ->name('admin_payment_method_index_content');

Route::get('/admin/payment_Method/{paymentMethodId}/active',
    'PaymentMethodController@active')
    ->name('admin_payment_method_active');

/***********************************
 * *******  Sales *************
 **********************************/

Route::get('/admin/sales',
    'SalesController@index')
    ->name('admin_sales_index');

Route::get('/admin/sales-content',
    'SalesController@indexContent')
    ->name('admin_sales_index_content');

Route::get('/admin/sales/{salesId}/sales-Products',
    'SalesController@productsVariants')
    ->name('admin_sales_products_variants');

Route::get('/admin/sales/{salesId}/sales-Products-content',
    'SalesController@productsVariantsContent')
    ->name('admin_sales_products_variants_content');

/***********************************
 * *******  Skydropx *************
 **********************************/
Route::get('/admin/sales/sales-skydropx-get-shipments',
    'SkydropxController@skydropxGetShipments')
    ->name('admin_sales_products_skydropx_get_shipments');

Route::get('/admin/sales/{salesId}/createShipment',
    'SkydropxController@createShipment')
    ->name('admin_sales_products_skydropx_create_shipment');

/***********************************
 * *******  Refund *************
 **********************************/

Route::get('/admin/refund',
    'RefundController@index')
    ->name('admin_refund_index');

Route::get('/admin/refund-content',
    'RefundController@indexContent')
    ->name('admin_refund_index_content');

Route::get('/admin/refund/{refundId}/refund-variant',
    'RefundController@refundVariant')
    ->name('admin_refund_variant');

/***********************************
 * *******  exchange *************
 **********************************/

Route::get('/admin/exchange',
    'ExchangeController@index')
    ->name('admin_exchange_index');

Route::get('/admin/exchange-content',
    'ExchangeController@indexContent')
    ->name('admin_exchange_index_content');

Route::get('/admin/exchange/{exchangeId}/exchange-saleVariant',
    'ExchangeController@exchangeSaleVariant')
    ->name('admin_exchange_sale_variant');

Route::get('/admin/exchange/{exchangeId}/exchange-variant',
    'ExchangeController@exchangeVariant')
    ->name('admin_exchange_variant');
