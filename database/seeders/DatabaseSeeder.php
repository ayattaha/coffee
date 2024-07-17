<?php

namespace Database\Seeders;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use App\Models\Product;
use Database\Factories\ProductFactory;
use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(3)->create();
        Category::factory(3)->create();
        Product::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
