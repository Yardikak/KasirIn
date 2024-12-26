<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            // Makanan Khas Italia
            [
                'product_name' => 'Pizza Margherita',
                'product_description' => 'Pizza dengan saus tomat, mozzarella, dan basil',
                'product_cost' => 50000,
                'product_price' => 75000,
                'product_quantity' => 30,
                'product_image' => 'assets/theme/img/menus/pizza-margherita.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Lasagna',
                'product_description' => 'Pasta lapis dengan daging cincang, saus tomat, dan keju',
                'product_cost' => 60000,
                'product_price' => 90000,
                'product_quantity' => 20,
                'product_image' => 'assets/theme/img/menus/lasagna.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Risotto',
                'product_description' => 'Nasi dimasak dengan kaldu hingga creamy',
                'product_cost' => 45000,
                'product_price' => 70000,
                'product_quantity' => 25,
                'product_image' => 'assets/theme/img/menus/risotto.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Tiramisu',
                'product_description' => 'Dessert dengan lapisan ladyfingers, kopi, dan mascarpone',
                'product_cost' => 35000,
                'product_price' => 50000,
                'product_quantity' => 40,
                'product_image' => 'assets/theme/img/menus/tiramisu.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Carbonara',
                'product_description' => 'Pasta dengan saus telur, keju, pancetta, dan lada hitam',
                'product_cost' => 40000,
                'product_price' => 60000,
                'product_quantity' => 35,
                'product_image' => 'assets/theme/img/menus/carbonara.jpeg',
                'product_status' => 'Ready'
            ],
            // Makanan Khas Jepang
            [
                'product_name' => 'Sushi',
                'product_description' => 'Nasi dengan lauk seperti ikan mentah atau sayuran',
                'product_cost' => 50000,
                'product_price' => 80000,
                'product_quantity' => 50,
                'product_image' => 'assets/theme/img/menus/sushi.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Ramen',
                'product_description' => 'Mie dalam kaldu dengan irisan daging, telur, dan sayuran',
                'product_cost' => 40000,
                'product_price' => 70000,
                'product_quantity' => 45,
                'product_image' => 'assets/theme/img/menus/ramen.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Tempura',
                'product_description' => 'Sayuran atau makanan laut yang digoreng dengan tepung',
                'product_cost' => 30000,
                'product_price' => 50000,
                'product_quantity' => 60,
                'product_image' => 'assets/theme/img/menus/tempura.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Sashimi',
                'product_description' => 'Irisan ikan mentah segar yang disajikan tanpa nasi',
                'product_cost' => 45000,
                'product_price' => 75000,
                'product_quantity' => 40,
                'product_image' => 'assets/theme/img/menus/sashimi.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Yakitori',
                'product_description' => 'Sate ayam yang dipanggang dengan bumbu khas Jepang',
                'product_cost' => 20000,
                'product_price' => 40000,
                'product_quantity' => 70,
                'product_image' => 'assets/theme/img/menus/yakitori.jpeg',
                'product_status' => 'Ready'
            ],
            // Makanan Khas Indonesia
            [
                'product_name' => 'Nasi Goreng',
                'product_description' => 'Nasi goreng dengan telur dan ayam',
                'product_cost' => 10000,
                'product_price' => 15000,
                'product_quantity' => 50,
                'product_image' => 'assets/theme/img/menus/nasi-goreng.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Rendang',
                'product_description' => 'Daging sapi dimasak dengan santan dan bumbu khas',
                'product_cost' => 30000,
                'product_price' => 50000,
                'product_quantity' => 30,
                'product_image' => 'assets/theme/img/menus/rendang.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Sate Ayam',
                'product_description' => 'Daging ayam yang ditusuk dan dipanggang dengan bumbu kacang',
                'product_cost' => 15000,
                'product_price' => 25000,
                'product_quantity' => 60,
                'product_image' => 'assets/theme/img/menus/sate-ayam.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Gado-gado',
                'product_description' => 'Sayuran rebus dengan saus kacang',
                'product_cost' => 12000,
                'product_price' => 20000,
                'product_quantity' => 40,
                'product_image' => 'assets/theme/img/menus/gado-gado.jpeg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Bakso',
                'product_description' => 'Bola daging yang disajikan dalam kuah kaldu',
                'product_cost' => 8000,
                'product_price' => 15000,
                'product_quantity' => 70,
                'product_image' => 'assets/theme/img/menus/bakso.jpeg',
                'product_status' => 'Ready'
            ],
            // Makanan Khas Chinese
            [
                'product_name' => 'Dim Sum',
                'product_description' => 'Kumpulan hidangan kecil seperti pangsit, bakpao, dan kue.',
                'product_cost' => 60000,
                'product_price' => 90000,
                'product_quantity' => 25,
                'product_image' => 'dim_sum.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Kung Pao Chicken',
                'product_description' => 'Ayam pedas dengan kacang dan sayuran.',
                'product_cost' => 70000,
                'product_price' => 100000,
                'product_quantity' => 20,
                'product_image' => 'kung_pao_chicken.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Sweet and Sour Pork',
                'product_description' => 'Daging babi dengan saus manis dan asam.',
                'product_cost' => 65000,
                'product_price' => 95000,
                'product_quantity' => 15,
                'product_image' => 'sweet_sour_pork.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Peking Duck',
                'product_description' => 'Ayam bebek panggang dengan kulit yang renyah dan daging yang lembut.',
                'product_cost' => 120000,
                'product_price' => 170000,
                'product_quantity' => 10,
                'product_image' => 'peking_duck.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Spring Rolls',
                'product_description' => 'Gulung sayuran yang digoreng hingga renyah.',
                'product_cost' => 40000,
                'product_price' => 60000,
                'product_quantity' => 30,
                'product_image' => 'spring_rolls.jpg',
                'product_status' => 'Ready'
            ],
            // Makanan Khas Korea
            [
                'product_name' => 'Bibimbap',
                'product_description' => 'Nasi campur Korea dengan berbagai sayuran, daging, dan telur.',
                'product_cost' => 70000,
                'product_price' => 95000,
                'product_quantity' => 20,
                'product_image' => 'bibimbap.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Kimchi Jjigae',
                'product_description' => 'Sup pedas Korea dengan kimchi dan daging babi.',
                'product_cost' => 80000,
                'product_price' => 110000,
                'product_quantity' => 15,
                'product_image' => 'kimchi_jjigae.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Bulgogi',
                'product_description' => 'Daging sapi yang dimarinasi dan dipanggang dengan saus manis dan asin.',
                'product_cost' => 90000,
                'product_price' => 130000,
                'product_quantity' => 18,
                'product_image' => 'bulgogi.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Tteokbokki',
                'product_description' => 'Kue beras Korea yang dimasak dalam saus pedas manis.',
                'product_cost' => 50000,
                'product_price' => 75000,
                'product_quantity' => 25,
                'product_image' => 'tteokbokki.jpg',
                'product_status' => 'Ready'
            ],
            [
                'product_name' => 'Korean Fried Chicken',
                'product_description' => 'Ayam goreng Korea dengan lapisan yang renyah dan saus manis pedas.',
                'product_cost' => 75000,
                'product_price' => 105000,
                'product_quantity' => 22,
                'product_image' => 'korean_fried_chicken.jpg',
                'product_status' => 'Ready'
            ],
        ];

        foreach ($menus as $menu) {
            Menu::firstOrCreate(
                ['product_name' => $menu['product_name']],
                $menu
            );
        }
    }
}
