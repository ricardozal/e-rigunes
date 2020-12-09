<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_DEBUG')) {
            DB::table('promotion')->insert([
                'expiration_date' => '2020-11-03',
                'coupon_code' => '123',
                'value' => 25,
                'description' => 'prueba promoción uno',
            ]);
        }
    }
}
