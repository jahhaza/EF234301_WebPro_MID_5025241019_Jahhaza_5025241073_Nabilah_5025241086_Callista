<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Apparel',
                'slug' => 'apparel',
                'description' => 'Official NIKI clothing and apparel',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'NIKI branded accessories',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Music',
                'slug' => 'music',
                'description' => 'Official music releases and vinyl',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Collectibles',
                'slug' => 'collectibles',
                'description' => 'Limited edition NIKI collectibles',
                'is_active' => true,
                'sort_order' => 4
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}