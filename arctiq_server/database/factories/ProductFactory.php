<?php

namespace Database\Factories;

use App\Models\Supplier;
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

        $supplier_id = Supplier::factory();
        $name = $this->faker->name();
        $price = $this->faker->randomFloat(2, 1, 100);
        // $image = $this->faker->imageUrl(640, 480, 'animals', true);

        return [
            'supplier_id' => $supplier_id,
            'name' => $name,
            'price' => $price,
            // 'image' => $image
        
        ];
    }
}
