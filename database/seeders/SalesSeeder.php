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
    }
}
