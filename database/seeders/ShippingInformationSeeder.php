<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ShippingInformationSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_DEBUG')) {
            DB::table('shipping_information')->insert([
                'skydropx_id'=>'1',
                'rate_id'=>'1',
                'shipping_price' => 100,
                'parcel_company' => 'DHL',
                'delivery_date' => '2020-11-03',
                'guide_number' => '123456789',
            ]);
        }
    }
}
