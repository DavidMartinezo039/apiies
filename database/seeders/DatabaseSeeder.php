<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear 10 categorías
        $categories = Category::factory(10)->create();

        // Crear 20 productos
        $products = Product::factory(20)->create();

        // Hacer uniones aleatorias entre las categorías y productos
        foreach ($products as $product) {
            // Selecciona hasta 3 categorías para cada producto
            $randomCategories = $categories->random(rand(1, 3))->pluck('id');

            foreach ($randomCategories as $categoryId) {
                CategoryProduct::create([
                    'category_id' => $categoryId,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
