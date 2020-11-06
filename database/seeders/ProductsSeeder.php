<?php


namespace Database\Seeders;


use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\PropertyValue;
use App\Models\Provider;
use App\Models\Size;
use App\Models\Variant;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{

    public $faker;

    const NEGRO = 1;
    const ROJO = 2;
    const AZUL = 3;
    const CAFE = 4;
    const BLANCO = 5;
    const GRIS = 6;
    const VERDE = 7;

    const TALLA_TRES = 1;
    const TALLA_CINCO = 5;
    const TALLA_SIETE = 9;
    const TALLA_SIETE_MEDIO = 10;

    public function run()
    {

        $this->faker = Factory::create();

        $this->colors();
        $this->sizes();

        if (env('APP_DEBUG')) {
            Provider::factory()->count(5)->create();

            /** Categoria 1 */

            $damaId = DB::table('category')->insertGetId([
                'name' => 'Dama',
                'description' => 'Zapatatos para dama',
            ]);

            /** Categoria 2 */

            $caballeroId = DB::table('category')->insertGetId([
                'name' => 'Caballero',
                'description' => 'Zapatatos para caballero',
            ]);

            /** Producto 1 **/

            $productId = DB::table('product')->insertGetId([
                'name' => 'Botas',
                'description' => 'Las mejores botas para invierno',
                'weight' => 1,
                'height' => 15,
                'width' => 30,
                'length' => 20,
                'public_price' => 600,
                'distributor_price' => 500,
                'fk_id_provider' => $this->faker->randomElement(array(1,2,3,4,5)),
                'fk_id_category' => $damaId
            ]);

            $variantIdOne = DB::table('variant')->insertGetId([
                'sku' => $this->faker->randomNumber(5),
                'fk_id_size' => ProductsSeeder::TALLA_TRES,
                'fk_id_product' => $productId,
                'created_at' => Carbon::now()
            ]);

            $variantIdTwo = DB::table('variant')->insertGetId([
                'sku' => $this->faker->randomNumber(5),
                'fk_id_size' => ProductsSeeder::TALLA_CINCO,
                'fk_id_product' => $productId,
                'created_at' => Carbon::now()
            ]);

            for ($i=0;$i<3;$i++){
                $imageId = DB::table('image')->insertGetId([
                    'url' => 'https://picsum.photos/id/' . rand(200, 300) . '/800/800',
                    'featured' => $i == 0,
                ]);

                DB::table('variant_has_images')->insert([
                    'fk_id_image' => $imageId,
                    'fk_id_color' => ProductsSeeder::CAFE,
                    'fk_id_variant' => $variantIdOne,
                ]);

                DB::table('variant_has_images')->insert([
                    'fk_id_image' => $imageId,
                    'fk_id_color' => ProductsSeeder::CAFE,
                    'fk_id_variant' => $variantIdTwo,
                ]);
            }

            /** Producto 2 **/

            $productId = DB::table('product')->insertGetId([
                'name' => 'Zapato casual',
                'description' => 'Zapatos casuales a la moda para jovenes',
                'weight' => 1,
                'height' => 15,
                'width' => 30,
                'length' => 20,
                'public_price' => 800,
                'distributor_price' => 600,
                'fk_id_provider' => $this->faker->randomElement(array(1,2,3,4,5)),
                'fk_id_category' => $caballeroId
            ]);

            $variantIdOne = DB::table('variant')->insertGetId([
                'sku' => $this->faker->randomNumber(5),
                'fk_id_size' => ProductsSeeder::TALLA_CINCO,
                'fk_id_product' => $productId,
                'created_at' => Carbon::now()
            ]);

            $variantIdTwo = DB::table('variant')->insertGetId([
                'sku' => $this->faker->randomNumber(5),
                'fk_id_size' => ProductsSeeder::TALLA_SIETE,
                'fk_id_product' => $productId,
                'created_at' => Carbon::now()
            ]);

            for ($i=0;$i<3;$i++){
                $imageId = DB::table('image')->insertGetId([
                    'url' => 'https://picsum.photos/id/' . rand(200, 300) . '/800/800',
                    'featured' => $i == 0,
                ]);

                DB::table('variant_has_images')->insert([
                    'fk_id_image' => $imageId,
                    'fk_id_color' => ProductsSeeder::NEGRO,
                    'fk_id_variant' => $variantIdOne,
                ]);

                DB::table('variant_has_images')->insert([
                    'fk_id_image' => $imageId,
                    'fk_id_color' => ProductsSeeder::NEGRO,
                    'fk_id_variant' => $variantIdTwo,
                ]);
            }

            $variantIdThree = DB::table('variant')->insertGetId([
                'sku' => $this->faker->randomNumber(5),
                'fk_id_size' => ProductsSeeder::TALLA_SIETE_MEDIO,
                'fk_id_product' => $productId,
                'created_at' => Carbon::now()
            ]);

            $variantIdFour = DB::table('variant')->insertGetId([
                'sku' => $this->faker->randomNumber(5),
                'fk_id_size' => ProductsSeeder::TALLA_SIETE,
                'fk_id_product' => $productId,
                'created_at' => Carbon::now()
            ]);

            for ($i=0;$i<3;$i++){
                $imageId = DB::table('image')->insertGetId([
                    'url' => 'https://picsum.photos/id/' . rand(200, 300) . '/800/800',
                    'featured' => $i == 0,
                ]);

                DB::table('variant_has_images')->insert([
                    'fk_id_image' => $imageId,
                    'fk_id_color' => ProductsSeeder::CAFE,
                    'fk_id_variant' => $variantIdThree,
                ]);

                DB::table('variant_has_images')->insert([
                    'fk_id_image' => $imageId,
                    'fk_id_color' => ProductsSeeder::CAFE,
                    'fk_id_variant' => $variantIdFour,
                ]);
            }

        }

    }

    public function colors()
    {
        DB::table('color')->insert([
            [
                'name' => 'Negro',
                'value' => '#000000',
            ],
            [
                'name' => 'Rojo',
                'value' => '#FF3535',
            ],
            [
                'name' => 'Azul',
                'value' => '#166FE1'
            ],
            [
                'name' => 'Café',
                'value' => '#8A6A4B'
            ],
            [
                'name' => 'Blanco',
                'value' => '#FFFFFF'
            ],
            [
                'name' => 'Gris',
                'value' => '#A1A1A1'
            ],
            [
                'name' => 'Verde',
                'value' => '#4B8E2E'
            ]
        ]);
    }

    public function sizes(){

        DB::table('size')->insert([
            [
                'value' => '23',
            ],
            [
                'value' => '23.5',
            ],
            [
                'value' => '24'
            ],
            [
                'value' => '24.5'
            ],
            [
                'value' => '25'
            ],
            [
                'value' => '25.5'
            ],
            [
                'value' => '26'
            ],
            [
                'value' => '26.5'
            ],
            [
                'value' => '27'
            ],
            [
                'value' => '27.5'
            ],
            [
                'value' => '28'
            ],
            [
                'value' => '28.5'
            ],
            [
                'value' => '29'
            ]
        ]);

    }

}
