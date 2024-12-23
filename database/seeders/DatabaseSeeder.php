<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'yanwarardikacahyani88@gmail.com',
        ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AdditionalSeeder::class,
            CustomerSeeder::class,
            MenuSeeder::class,
            
            // Add more seeders as needed
        ]);
    }
}
