<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'voucher_no'=>$this->faker->ean8,
            'total'=>$this->faker->ean8,
            'qty'=>rand(1,10),
            'payment_slip'=>$this->faker->imageUrl,
            'status'=>$this->faker->word,
            'note'=>$this->faker->paragraph,
            'item_id'=>rand(1,10),
            'payment_id'=>rand(1,10),
            'user_id'=>rand(1,1)
            
        ];
    }
}
