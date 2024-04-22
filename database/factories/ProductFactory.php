<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
 
        // 'images/products/tshirtphp.png'
        $urls = [
            'images/products/1.png',
            'images/products/2.png',
            'images/products/3.png',
            'images/products/4.png',
        ];

        return [
            'name' => fake()->text(10),
            'price' => fake()->randomFloat(2, 30.00, 80.00),
            'img_url' => $urls[random_int(0, 3)],
        ];
    }
}
