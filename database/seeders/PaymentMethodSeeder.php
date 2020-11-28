<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_method')->insert([
            'name'=>'PayPal'
        ]);

        DB::table('payment_method')->insert([
            'name'=>'Tarjeta de credito/débito'
        ]);
    }
}
