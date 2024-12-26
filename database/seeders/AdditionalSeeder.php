<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            // Additional Khas Italia
            [
                'additional_name' => 'Parmesan Cheese',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Chilly Sauce',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Garlic Bread',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Caesar Salad',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Whipped Cream',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Espresso',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Truffle Mushroom',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Cocoa Powder',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Wasabi',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Gari',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Soy Sauce Shoyu',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Nori',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Onsen Tamago',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Tentsuyu Sauce',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Daikon Oroshi',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Jeruk nipis',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Teriyaki Sauce',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Kerupuk',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Acar Timun',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Telur Mata Sapi',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Sambal Kacang',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Bawang Goreng',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Lontong',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Serundeng',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Sambal Ijo',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Emping Melinjo',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Pangsit Goreng',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Daun Seledri',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Hoisin Sauce',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Nasi Putih',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Fresh Cucumber',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Kulit Lumpia',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Gochujang',
                'additional_description' => '',
                'additional_status' => 'Ready'
            ],
            [
                'additional_name' => 'Kimchi',
                'additional_description' => '',
                'additional_status' => 'Ready'
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
