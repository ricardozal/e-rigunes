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


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
        Schema::dropIfExists('buyer');
        Schema::dropIfExists('user');
        Schema::dropIfExists('role');
    }
}
