<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Fashion', 'Appliances', 'Computing'];

        foreach ($categories as $category) {
            Category::create([
                'category' => $category,
                'slug' => Str::slug($category),
            ]);
        }

        // Fashion subcategories
        $fashion = ['Men\'s Fashion', 'Women\'s Fashion', 'Kid\'s Fashion'];

        foreach ($fashion as $subCategory) {
            Category::create([
                'category' => $subCategory,
                'slug' => Str::slug($subCategory),
                'parent_id' => 1,
            ]);
        }

        // Appliances subcategories
        $appliances = ['Large Appliance', 'Small Appliance', 'Cooking Appliance'];

        foreach ($appliances as $subCategory) {
            Category::create([
                'category' => $subCategory,
                'slug' => Str::slug($subCategory),
                'parent_id' => 2,
            ]);
        }

        // Computing subcategories
        $computing = ['Laptops', 'Computers & Accessories', 'Computer Components', 'Computer Data Storage', 'Phones & Tablets'];

        foreach ($computing as $subCategory) {
            Category::create([
                'category' => $subCategory,
                'slug' => Str::slug($subCategory),
                'parent_id' => 3,
            ]);
        }
    }
}
