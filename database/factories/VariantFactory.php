<?php

namespace Database\Factories;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->randomNumber(5),
            'public_price' => $this->faker->randomFloat(2,300,1000),
            'distributor_price' => $this->faker->randomFloat(2,300,1000),
        ];
    }
}
