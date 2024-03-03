<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            'product' => $product = $this->faker->name,
            'slug' => Str::slug($product),
            'list_price' => $list_price = rand(1800, 2000),
            'retail_price' => $list_price - rand(200, 350),
            'status' => 1,
            'brand_id' => $this->faker->randomElement(Brand::get()->pluck('id')),
        ];
    }
}
