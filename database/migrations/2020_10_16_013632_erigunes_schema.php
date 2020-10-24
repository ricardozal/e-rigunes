<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ErigunesSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_contact_website', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('message');
            $table->timestamps();
        });

        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->boolean('active')
                ->default(true);
            $table->unsignedInteger('fk_id_role');
            $table->timestamps();

            $table->foreign('fk_id_role')
                ->references('id')
                ->on('role');

        });

        Schema::create('buyer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('father_last_name');
            $table->string('mother_last_name');
            $table->date('birthday');
            $table->string('phone');
            $table->string('customer_stripe_id')->nullable();
            $table->boolean('active')
                ->default(true);
            $table->unsignedInteger('fk_id_user');
            $table->timestamps();

            $table->foreign('fk_id_user')
                ->references('id')
                ->on('user');
        });

        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('ext_num');
            $table->string('int_num')->nullable();
            $table->string('colony');
            $table->string('zip_code');
            $table->string('city');
            $table->string('state');
            $table->string('country')->nullable();
            $table->string('references',1000);
            $table->boolean('active')
                ->default(true);
            $table->unsignedInteger('fk_id_buyer');
            $table->timestamps();

            $table->foreign('fk_id_buyer')
                ->references('id')
                ->on('buyer');
        });

        Schema::create('credit_card', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_number');
            $table->string('cardholder');
            $table->string('expiration_month');
            $table->string('expiration_year');
            $table->string('payment_method_key');
            $table->unsignedInteger('fk_id_buyer');
            $table->timestamps();

            $table->foreign('fk_id_buyer')
                ->references('id')
                ->on('buyer');
        });

        Schema::create('provider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('business_name');
            $table->string('seller_name');
            $table->string('seller_phone');
            $table->string('seller_email');
            $table->boolean('active')
                ->default(true);
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 1000);
            $table->string('image_url')->nullable();
            $table->boolean('active')
                ->default(true);
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 1000);
            $table->integer('weight');
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->decimal('public_price', 13, 2);
            $table->decimal('distributor_price', 13, 2);
            $table->boolean('active')
                ->default(true);
            $table->unsignedInteger('fk_id_provider');
            $table->unsignedInteger('fk_id_category');
            $table->timestamps();

            $table->foreign('fk_id_provider')
                ->references('id')
                ->on('provider');

            $table->foreign('fk_id_category')
                ->references('id')
                ->on('category');

        });

        Schema::create('size', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
        });

        Schema::create('color', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
        });

        Schema::create('variant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->boolean('active')
                ->default(true);
            $table->unsignedInteger('fk_id_product');
            $table->unsignedInteger('fk_id_size');
            $table->unsignedInteger('fk_id_color');
            $table->timestamps();

            $table->foreign('fk_id_product')
                ->references('id')
                ->on('product');

            $table->foreign('fk_id_size')
                ->references('id')
                ->on('size');

            $table->foreign('fk_id_color')
                ->references('id')
                ->on('color');
        });

        Schema::create('variant_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 1000);
            $table->boolean('featured')
                ->default(false);
            $table->integer('position');
            $table->unsignedInteger('fk_id_variant');

            $table->foreign('fk_id_variant')
                ->references('id')
                ->on('variant');
        });

        Schema::create('favorite_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fk_id_buyer');
            $table->unsignedInteger('fk_id_product');

            $table->foreign('fk_id_buyer')
                ->references('id')
                ->on('buyer');

            $table->foreign('fk_id_product')
                ->references('id')
                ->on('product');
        });

        Schema::create('rating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->string('comment')->nullable();
            $table->unsignedInteger('fk_id_buyer');
            $table->unsignedInteger('fk_id_product');

            $table->foreign('fk_id_product')
                ->references('id')
                ->on('product');
        });

        Schema::create('payment_method', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->boolean('active')
                ->default(true);
            $table->timestamps();
        });

        Schema::create('promotion', function (Blueprint $table){
            $table->increments('id');
            $table->date('expiration_date');
            $table->string('coupon_code')->unique()->nullable();
            $table->integer('max_number_swaps');
            $table->integer('swaps')->default(0);
            $table->boolean('is_percentage');
            $table->decimal('value',13,2);
            $table->decimal('min_amount',13,2)->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')
                ->default(true);
            $table->timestamps();
        });

        Schema::create('shipping_information', function (Blueprint $table){
            $table->increments('id');
            $table->string('skydropx_id');
            $table->decimal('shipping_price',13,2);
            $table->string('parcel_company');
            $table->date('delivery_date');
            $table->string('guide_number');
            $table->timestamps();
        });

        Schema::create('sale', function(Blueprint $table){
            $table->increments('id');
            $table->decimal('total_price',13,2);
            $table->decimal('discounts',13,2)->nullable();
            $table->boolean('billing')->default(false);
            $table->unsignedInteger('fk_id_promotion');
            $table->unsignedInteger('fk_id_shipping_information')->nullable();
            $table->unsignedInteger('fk_id_buyer');
            $table->unsignedInteger('fk_id_shipping_address');
            $table->unsignedInteger('fk_id_payment_method');
            $table->timestamps();

            $table->foreign('fk_id_promotion')
                ->references('id')
                ->on('promotion');

            $table->foreign('fk_id_buyer')
                ->references('id')
                ->on('buyer');

            $table->foreign('fk_id_shipping_information')
                ->references('id')
                ->on('shipping_information');

            $table->foreign('fk_id_shipping_address')
                ->references('id')
                ->on('address');

            $table->foreign('fk_id_payment_method')
                ->references('id')
                ->on('payment_method');
        });

        Schema::create('sale_variants', function(Blueprint $table){
            $table->increments('id');
            $table->integer('quantity');
            $table->decimal('sale_price',13,2);
            $table->unsignedInteger('fk_id_variant');
            $table->unsignedInteger('fk_id_sale');

            $table->foreign('fk_id_variant')
                ->references('id')
                ->on('variant');

            $table->foreign('fk_id_sale')
                ->references('id')
                ->on('sale');
        });

        Schema::create('sale_status', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('sale_history', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('fk_id_sale_status');
            $table->unsignedInteger('fk_id_sale');

            $table->foreign('fk_id_sale_status')
                ->references('id')
                ->on('sale_status');

            $table->foreign('fk_id_sale')
                ->references('id')
                ->on('sale');
        });

        Schema::create('purchase', function(Blueprint $table){
            $table->increments('id');
            $table->decimal('total_price',13,2);
            $table->unsignedInteger('fk_id_provider');
            $table->timestamps();

            $table->foreign('fk_id_provider')
                ->references('id')
                ->on('provider');
        });

        Schema::create('purchase_variants', function(Blueprint $table){
            $table->increments('id');
            $table->integer('quantity');
            $table->decimal('purchase_price',13,2);
            $table->unsignedInteger('fk_id_variant');
            $table->unsignedInteger('fk_id_purchase');

            $table->foreign('fk_id_variant')
                ->references('id')
                ->on('variant');

            $table->foreign('fk_id_purchase')
                ->references('id')
                ->on('purchase');
        });

        Schema::create('refund_status', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('refund', function(Blueprint $table){
            $table->increments('id');
            $table->string('reason',1000);
            $table->integer('quantity');
            $table->unsignedInteger('fk_id_refund_address')->nullable();
            $table->unsignedInteger('fk_id_shipping_info')->nullable();
            $table->unsignedInteger('fk_id_sale_variant');
            $table->unsignedInteger('fk_id_buyer');
            $table->unsignedInteger('fk_id_refund_status');
            $table->timestamps();

            $table->foreign('fk_id_refund_address')
                ->references('id')
                ->on('address');

            $table->foreign('fk_id_shipping_info')
                ->references('id')
                ->on('shipping_information');

            $table->foreign('fk_id_sale_variant')
                ->references('id')
                ->on('sale_variants');

            $table->foreign('fk_id_buyer')
                ->references('id')
                ->on('buyer');

            $table->foreign('fk_id_refund_status')
                ->references('id')
                ->on('refund_status');

        });

        Schema::create('refund_images', function(Blueprint $table){
            $table->increments('id');
            $table->string('url_image');
            $table->unsignedInteger('fk_id_refund');

            $table->foreign('fk_id_refund')
                ->references('id')
                ->on('refund');
        });

        Schema::create('exchange_status', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('exchange', function(Blueprint $table){
            $table->increments('id');
            $table->string('reason',1000);
            $table->boolean('warranty')->default(false);
            $table->unsignedInteger('fk_id_exchange_address')->nullable();
            $table->unsignedInteger('fk_id_shipping_info')->nullable();
            $table->unsignedInteger('fk_id_sale_variant');
            $table->unsignedInteger('fk_id_exchange_variant');
            $table->unsignedInteger('fk_id_buyer');
            $table->unsignedInteger('fk_id_exchange_status');
            $table->timestamps();

            $table->foreign('fk_id_exchange_address')
                ->references('id')
                ->on('address');

            $table->foreign('fk_id_shipping_info')
                ->references('id')
                ->on('shipping_information');

            $table->foreign('fk_id_sale_variant')
                ->references('id')
                ->on('sale_variants');

            $table->foreign('fk_id_exchange_variant')
                ->references('id')
                ->on('variant');

            $table->foreign('fk_id_buyer')
                ->references('id')
                ->on('buyer');

            $table->foreign('fk_id_exchange_status')
                ->references('id')
                ->on('exchange_status');

        });

        Schema::create('exchange_images', function(Blueprint $table){
            $table->increments('id');
            $table->string('url_image');
            $table->unsignedInteger('fk_id_exchange');

            $table->foreign('fk_id_exchange')
                ->references('id')
                ->on('exchange');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_images');
        Schema::dropIfExists('exchange');
        Schema::dropIfExists('exchange_status');
        Schema::dropIfExists('refund_images');
        Schema::dropIfExists('refund');
        Schema::dropIfExists('refund_status');
        Schema::dropIfExists('purchase_variants');
        Schema::dropIfExists('purchase');
        Schema::dropIfExists('sale_history');
        Schema::dropIfExists('sale_status');
        Schema::dropIfExists('sale_variants');
        Schema::dropIfExists('sale');
        Schema::dropIfExists('shipping_information');
        Schema::dropIfExists('promotion');
        Schema::dropIfExists('payment_method');
        Schema::dropIfExists('rating');
        Schema::dropIfExists('favorite_product');
        Schema::dropIfExists('variant_image');
        Schema::dropIfExists('variant');
        Schema::dropIfExists('color');
        Schema::dropIfExists('size');
        Schema::dropIfExists('product');
        Schema::dropIfExists('category');
        Schema::dropIfExists('provider');
        Schema::dropIfExists('credit_card');
        Schema::dropIfExists('address');
        Schema::dropIfExists('buyer');
        Schema::dropIfExists('user');
        Schema::dropIfExists('role');
        Schema::dropIfExists('data_contact_website');
    }
}
