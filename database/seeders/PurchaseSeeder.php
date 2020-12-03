<?php

namespace Database\Seeders;

use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('purchase_status')->insert([
            'name'=>'Pedido'
        ]);

        DB::table('purchase_status')->insert([
            'name'=>'En camino'
        ]);

        DB::table('purchase_status')->insert([
            'name'=>'Entregado'
        ]);

        DB::table('purchase')->insertGetId([
            'total_price'=> 1100,
            'fk_id_provider' => 1,
            'fk_id_purchase_status' => 1
        ]);

        DB::table('purchase_variants')->insertGetId([
            'quantity' => 2,
            'purchase_price'=> 1100,
            'fk_id_variant' => 1,
            'fk_id_purchase' => 1
        ]);
    }
}
