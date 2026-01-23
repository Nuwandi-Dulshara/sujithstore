<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => 'password123',
        ]);

        // Seed some categories and products (products use discount_percentage)
        $categories = \App\Models\Category::factory()->count(6)->create();

        foreach ($categories as $category) {
            \App\Models\Product::factory()->count(6)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
