<?php

namespace Database\Seeders;

use Carbon\Carbon;
use \Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class RefundSeeder extends Seeder
{
    public function run()
    {
        DB::table('refund_status')->insert([
            'name'=>'Solicitado'
        ]);

        DB::table('refund_status')->insert([
            'name'=>'Aceptado'
        ]);

        DB::table('refund_status')->insert([
            'name'=>'Declinado'
        ]);

        DB::table('refund_status')->insert([
            'name'=>'Terminado'
        ]);

        $refundIdOne = DB::table('refund')->insertGetId([
            'reason' => 'Reembolso de prueba',
            'quantity' => 1,
            'fk_id_refund_address' => 1,
            'fk_id_shipping_info' => 1,
            'fk_id_sale_variant' => 1,
            'fk_id_buyer' => 1,
            'fk_id_refund_status' => 1,
            'created_at' => Carbon::now()
        ]);

        for ($i=0;$i<3;$i++){
            DB::table('refund_images')->insertGetId([
                'url_image' => 'https://picsum.photos/id/' . rand(200, 300) . '/800/800',
                'fk_id_refund' => $refundIdOne
            ]);
        }
    }
}
