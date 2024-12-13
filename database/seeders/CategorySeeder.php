<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Indonesian',
                'category_description' => 'Indonesian culinary from Java',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Chinese',
                'category_description' => 'Authentic Chinese cuisine with rich flavors',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Italian',
                'category_description' => 'Classic Italian dishes with a modern twist',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Mexican',
                'category_description' => 'Spicy and vibrant Mexican flavors',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Japanese',
                'category_description' => 'Fresh and delicate Japanese cuisine',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Middle Eastern',
                'category_description' => 'Aromatic dishes inspired by Middle Eastern culture',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'French',
                'category_description' => 'Elegant French culinary art with rich textures',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Indian',
                'category_description' => 'A blend of spices and flavors from India',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Thai',
                'category_description' => 'A mix of sweet, sour, and spicy Thai dishes',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Korean',
                'category_description' => 'Popular Korean delicacies and street food',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'Vietnamese',
                'category_description' => 'Light and fresh Vietnamese traditional dishes',
                'category_status' => 'Active',
            ],
            [
                'category_name' => 'American',
                'category_description' => 'Comfort food from American cuisine',
                'category_status' => 'Active',
            ],
            
            
            
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['category_name' => $category['category_name']],
                $category
            );
        }
    }
}

