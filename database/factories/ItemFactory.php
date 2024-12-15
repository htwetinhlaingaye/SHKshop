<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'code_no'=>$this->faker->ean8,
            'name'=>$this->faker->word,
            'image'=>$this->faker->imageUrl,
            'price'=>$this->faker->numberBetween(10000,90000),
            'discount'=>$this->faker->numberBetween(10,70),
            'in_stock'=>rand(0,1),
            'description'=>$this->faker->paragraph,
            'category_id'=>rand(1,10)
        ];
    }
}
