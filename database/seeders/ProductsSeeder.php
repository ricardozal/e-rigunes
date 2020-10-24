<?php


namespace Database\Seeders;


use App\Models\Category;
use App\Models\Product;
use App\Models\PropertyValue;
use App\Models\Provider;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {

        $this->colors();
        $this->sizes();

        if (env('APP_DEBUG')) {
            Category::factory()->count(5)->create();
            Provider::factory()->count(5)->create();
            Product::factory()
                ->count(20)
                ->has(Variant::factory()
                    ->count(3))
                ->create();

            $variants = Variant::all();

            foreach ($variants as $variant){
                for ($i=0;$i<3;$i++){
                    DB::table('variant_image')->insert([
                        'url' => 'https://picsum.photos/id/' . rand(200, 300) . '/800/800',
                        'featured' => $i == 0,
                        'position' => ($i+1),
                        'fk_id_variant' => $variant->id,
                    ]);
                }

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
