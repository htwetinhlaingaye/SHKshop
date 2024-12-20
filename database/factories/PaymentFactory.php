<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word,
            'logo'=>$this->faker->imageUrl
        ];
    }
}
