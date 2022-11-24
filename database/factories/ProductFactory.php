<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{


    protected $model = \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name' => "Product from {$this->faker->name()}"  ,
            "description" => $this->faker->text(maxNbChars: 30),
            'unit_price' => $this->faker->randomFloat(nbMaxDecimals:2, min: 1, max: 200),
            "quantity" => $this->faker->randomDigit,
            "total_cost" => $this->faker->randomFloat(nbMaxDecimals:2, min: 100, max: 1000)
        ];
    }
}
