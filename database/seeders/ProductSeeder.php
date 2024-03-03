<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)
            ->create()
            ->each(function (Product $product) {
                $categories = Category::all()->random(4)->pluck('id');

                $product->categories()->attach($categories);
            });
    }
}
