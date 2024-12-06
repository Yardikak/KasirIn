<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            
            [
                'customer_fullname'=>'Hilmi Datu Allam',
                'customer_gender'=>'Male',
                'customer_email'=>'hilmi.mihil@gmail.com',
                'customer_phone'=> 082146828222,
                'customer_birth'=>'2024-11-27',
                'customer_status'=>'Active',
            ],
            [
                'customer_fullname'=>'Yanwar Ardika Cahyani',
                'customer_gender'=>'Male',
                'customer_email'=>'yanwar@gmail.com',
                'customer_phone'=> 082187642943,
                'customer_birth'=>'2024-11-27',
                'customer_status'=>'Active',
            ],
            [
                'customer_fullname'=>'Muhammad Arif Syarifuddin',
                'customer_gender'=>'Male',
                'customer_email'=>'syarif@gmail.com',
                'customer_phone'=> 085297547684,
                'customer_birth'=>'2024-11-27',
                'customer_status'=>'Active',
            ],
            [
                'customer_fullname'=>'Hanif Maulana Yusuf',
                'customer_gender'=>'Male',
                'customer_email'=>'yusuf@gmail.com',
                'customer_phone'=> 085227859625,
                'customer_birth'=>'2024-11-27',
                'customer_status'=>'Active',
            ],
            [
                'customer_fullname' => 'Naufal Rizky Ramadhan',
                'customer_gender' => 'Male',
                'customer_email' => 'naufal.rizky@gmail.com',
                'customer_phone' => 081254789321,
                'customer_birth' => '1995-10-15',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Farah Amalia Putri',
                'customer_gender' => 'Female',
                'customer_email' => 'farah.putri@gmail.com',
                'customer_phone' => 082194563782,
                'customer_birth' => '1987-05-12',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Rendra Wijaya Kusuma',
                'customer_gender' => 'Male',
                'customer_email' => 'rendra.kusuma@gmail.com',
                'customer_phone' => 085298654321,
                'customer_birth' => '1990-03-07',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Aulia Fadilah Pratama',
                'customer_gender' => 'Female',
                'customer_email' => 'aulia.fadilah@gmail.com',
                'customer_phone' => 081365478219,
                'customer_birth' => '2002-07-19',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Dimas Agung Santoso',
                'customer_gender' => 'Male',
                'customer_email' => 'dimas.santoso@gmail.com',
                'customer_phone' => 081278453916,
                'customer_birth' => '1985-01-29',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Nurul Anisa Dewi',
                'customer_gender' => 'Female',
                'customer_email' => 'nurul.dewi@gmail.com',
                'customer_phone' => 085378912645,
                'customer_birth' => '1998-06-10',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Rahmat Fadlan Maulana',
                'customer_gender' => 'Male',
                'customer_email' => 'rahmat.maulana@gmail.com',
                'customer_phone' => 082134576892,
                'customer_birth' => '1982-09-23',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Siti Amirah Zahra',
                'customer_gender' => 'Female',
                'customer_email' => 'siti.zahra@gmail.com',
                'customer_phone' => 081293847165,
                'customer_birth' => '1993-04-17',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Eko Setiawan Putra',
                'customer_gender' => 'Male',
                'customer_email' => 'eko.putra@gmail.com',
                'customer_phone' => 081247965834,
                'customer_birth' => '2000-02-14',
                'customer_status' => 'Active',
            ],
            [
                'customer_fullname' => 'Dewi Ayu Lestari',
                'customer_gender' => 'Female',
                'customer_email' => 'dewi.lestari@gmail.com',
                'customer_phone' => 082193746528,
                'customer_birth' => '1989-08-06',
                'customer_status' => 'Active',
            ],
            
        ];

        foreach ($customers as $customer) {
            Customer::firstOrCreate(
                ['customer_fullname' => $customer['customer_fullname']],
                $customer
            );
        }
    }
}

