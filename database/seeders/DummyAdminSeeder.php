<?php

namespace Database\Seeders;

use App\Models\dataadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama_admin' => 'Saddam Aryo Cahyotomo',
                'email' => 'saddamblitz@gmail.com',
                'nomor_admin' => '01928919119',
                'password' => bcrypt('123456'),
            ],
            [
                'nama_admin' => 'Dharma',
                'email' => 'dharmaz@gmail.com',
                'nomor_admin' => '0192891911119',
                'password' => bcrypt('123456'),
            ],
            
            ];
            foreach ($userData as $key => $val){
                dataadmin::create($val);
            }
    }
}
