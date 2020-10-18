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

        $this->property();
        $this->propertyValue();

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
                $variant->propertyValues()->attach(PropertyValue::whereFkIdProperty(1)->inRandomOrder()->first()->id);
                $variant->propertyValues()->attach(PropertyValue::whereFkIdProperty(2)->inRandomOrder()->first()->id);

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

    public function property()
    {
        DB::table('property')->insert([
            [
                'name' => 'Talla',
                'active' => true,
            ],
            [
                'name' => 'Color',
                'active' => true,
            ]
        ]);
    }

    public function propertyValue(){
        DB::table('property_value')->insert([
            [
                'name' => '23',
                'value' => '23',
                'active' => true,
                'fk_id_property' => 1
            ],
            [
                'params' => '24',
                'value' => '24',
                'active' => true,
                'fk_id_property' => 1
            ],
            [
                'params' => '25',
                'value' => '25',
                'active' => true,
                'fk_id_property' => 1
            ],
            [
                'params' => '26',
                'value' => '26',
                'active' => true,
                'fk_id_property' => 1
            ],
            [
                'params' => '27',
                'value' => '27',
                'active' => true,
                'fk_id_property' => 1
            ],
            [
                'params' => 'Negro',
                'value' => '#000000',
                'active' => true,
                'fk_id_property' => 2
            ],
            [
                'params' => 'Azul',
                'value' => '#0000ff',
                'active' => true,
                'fk_id_property' => 2
            ]
        ]);
    }
}
