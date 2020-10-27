<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Size;
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
            'fk_id_size' => Size::inRandomOrder()->first()->id,
        ];
    }
}
