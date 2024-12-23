<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Additional;

class AdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $additionals = [
            [
                'additional_name' => 'Extra Cheese',
                'additional_description' => 'Add extra cheese to your dish.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Avocado',
                'additional_description' => 'Fresh avocado slices.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Grilled Chicken',
                'additional_description' => 'Add a portion of grilled chicken.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Spicy Sauce',
                'additional_description' => 'Hot and spicy sauce for extra flavor.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Garlic Bread',
                'additional_description' => 'Two slices of crispy garlic bread.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Bacon Bits',
                'additional_description' => 'Crunchy bacon bits as a topping.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Extra Rice',
                'additional_description' => 'Add an extra serving of rice.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Mushrooms',
                'additional_description' => 'Sautéed mushrooms for your dish.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Fried Egg',
                'additional_description' => 'Add a sunny-side-up fried egg.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Parmesan Cheese',
                'additional_description' => 'Grated parmesan cheese for added flavor.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Chili Flakes',
                'additional_description' => 'Spicy chili flakes to heat up your meal.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Sweet Corn',
                'additional_description' => 'Fresh sweet corn as an add-on.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Barbecue Sauce',
                'additional_description' => 'A side of tangy barbecue sauce.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Onion Rings',
                'additional_description' => 'Crispy fried onion rings.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Pickles',
                'additional_description' => 'Tangy pickles to complement your dish.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Pineapple',
                'additional_description' => 'Juicy pineapple chunks.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Croutons',
                'additional_description' => 'Crunchy croutons for salads or soups.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Whipped Cream',
                'additional_description' => 'A dollop of whipped cream.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Chocolate Chips',
                'additional_description' => 'Sweet chocolate chips.',
                'additional_status' => 'Active',
            ],
            [
                'additional_name' => 'Lemon Wedges',
                'additional_description' => 'Fresh lemon wedges for zest.',
                'additional_status' => 'Active',
            ],
        
            
        ];

        foreach ($additionals as $additional) {
            Additional::firstOrCreate(
                ['additional_name' => $additional['additional_name']],
                $additional
            );
        }
    }
}

