<?php

namespace Database\Seeders;

use Carbon\Carbon;
use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ExchangeSeeder extends Seeder
{
    public function run()
    {
        DB::table('exchange_status')->insert([
            'name'=>'Solicitado'
        ]);

        DB::table('exchange_status')->insert([
            'name'=>'Aceptado'
        ]);

        DB::table('exchange_status')->insert([
            'name'=>'Declinado'
        ]);

        DB::table('exchange_status')->insert([
            'name'=>'Terminado'
        ]);
    }
}
