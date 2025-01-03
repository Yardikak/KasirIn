<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'table_name' => 'Table 1',
                'table_number' => 1,
                'table_capacity' => 4,
                'table_width' => 100,
                'table_height' => 75,
                'table_color' => 'Red',
                'table_status' => 'Empty',
                'table_position' => 1,
            ],
            [
                'table_name' => 'Table 2',
                'table_number' => 2,
                'table_capacity' => 2,
                'table_width' => 80,
                'table_height' => 70,
                'table_color' => 'Blue',
                'table_status' => 'Filled',
                'table_position' => 1,
            ],
            [
                'table_name' => 'Table 3',
                'table_number' => 3,
                'table_capacity' => 6,
                'table_width' => 120,
                'table_height' => 80,
                'table_color' => 'Green',
                'table_status' => 'Empty',
                'table_position' => 2,
            ],
            [
                'table_name' => 'Table 4',
                'table_number' => 4,
                'table_capacity' => 4,
                'table_width' => 100,
                'table_height' => 75,
                'table_color' => 'Yellow',
                'table_status' => 'Filled',
                'table_position' => 2,
            ],
            [
                'table_name' => 'Table 5',
                'table_number' => 5,
                'table_capacity' => 8,
                'table_width' => 150,
                'table_height' => 85,
                'table_color' => 'Black',
                'table_status' => 'Empty',
                'table_position' => 3,
            ],
            [
                'table_name' => 'Table 6',
                'table_number' => 6,
                'table_capacity' => 4,
                'table_width' => 100,
                'table_height' => 75,
                'table_color' => 'White',
                'table_status' => 'Filled',
                'table_position' => 3,
            ],
            [
                'table_name' => 'Table 7',
                'table_number' => 7,
                'table_capacity' => 2,
                'table_width' => 80,
                'table_height' => 70,
                'table_color' => 'Pink',
                'table_status' => 'Empty',
                'table_position' => 1,
            ],
            [
                'table_name' => 'Table 8',
                'table_number' => 8,
                'table_capacity' => 6,
                'table_width' => 120,
                'table_height' => 80,
                'table_color' => 'Orange',
                'table_status' => 'Filled',
                'table_position' => 2,
            ],
            [
                'table_name' => 'Table 9',
                'table_number' => 9,
                'table_capacity' => 4,
                'table_width' => 100,
                'table_height' => 75,
                'table_color' => 'Brown',
                'table_status' => 'Empty',
                'table_position' => 1,
            ],
            [
                'table_name' => 'Table 10',
                'table_number' => 10,
                'table_capacity' => 8,
                'table_width' => 150,
                'table_height' => 85,
                'table_color' => 'Grey',
                'table_status' => 'Filled',
                'table_position' => 3,
            ],
        ];

        foreach ($tables as $table) {
            Table::firstOrCreate(
                ['table_number' => $table['table_number']],
                $table
            );
        }
    }
}

