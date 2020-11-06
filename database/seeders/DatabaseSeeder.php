<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ShippingInformationSeeder::class);
        $this->call(SalesSeeder::class);
    }
}
