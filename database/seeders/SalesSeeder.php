<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_status')->insert([
            'name'=>'Pedido'
        ]);

        DB::table('sale_status')->insert([
            'name'=>'En camino'
        ]);

        DB::table('sale_status')->insert([
            'name'=>'Entregado'
        ]);

        $saleIdOne = DB::table('sale')->insertGetId([
            'total_price'=> 1100,
            'fk_id_buyer' => 1,
            'fk_id_shipping_address' => 1,
            'fk_id_payment_method' => 1
        ]);

        DB::table('sale_history')->insert([
            'fk_id_sale_status'=> 1,
            'fk_id_Sale' => 1
        ]);

        DB::table('sale_variants')->insert([
            'quantity'=> 2,
            'sale_price' => 380,
            'fk_id_variant' => 1,
            'fk_id_sale' => $saleIdOne
        ]);
    }
}
