<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brand' => 'Adidas',
                'website' => 'https://adidas.com',
            ],
            [
                'brand' => 'Nike',
                'website' => 'https://nike.com',
            ],
            [
                'brand' => 'Louis Vuitton',
                'website' => 'https://eu.louisvuitton.com/eng-e1/homepage',
            ],
            [
                'brand' => 'Samsung',
                'website' => 'https://samsung.com',
            ],
            [
                'brand' => 'LG',
                'website' => 'https://lg.com',
            ],
            [
                'brand' => 'HP',
                'website' => 'https://www.hp.com/us-en/home.html',
            ],
            [
                'brand' => 'Lenovo',
                'website' => 'https://www.lenovo.com/us/en/',
            ],
        ];

        foreach($brands as $brand) {
            Brand::create([
                'brand' => $brandName = $brand['brand'],
                'slug' => Str::slug($brandName),
                'website' => $brand['website'],
            ]);
        }
    }
}
