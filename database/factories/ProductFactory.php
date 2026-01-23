<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $price = fake()->randomFloat(2, 10, 2000);
        // 40% chance to have a discount between 5% and 70%
        $discount = fake()->optional(0.4)->numberBetween(5, 70);

        return [
            'category_id' => Category::factory(),
            'name' => fake()->words(2, true),
            'sku' => strtoupper(fake()->unique()->bothify('SKU-#####')),
            'price' => $price,
            'discount_percentage' => $discount,
            'quantity' => fake()->numberBetween(0, 100),
            'description' => fake()->paragraph(),
            'status' => 'available',
            'featured' => fake()->boolean(10),
        ];
    }
}
