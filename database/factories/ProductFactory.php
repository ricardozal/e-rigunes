<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'description' => $this->faker->paragraph,
            'weight' => 1,
            'height' => 15,
            'width' => 30,
            'length' => 20,
            'public_price' => $this->faker->randomFloat(2,300,1000),
            'fk_id_provider' => $this->faker->randomElement(array(1,2,3,4,5)),
            'fk_id_category' => $this->faker->randomElement(array(1,2,3,4,5))
        ];
    }
}
