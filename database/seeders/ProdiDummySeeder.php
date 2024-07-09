<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiData = [
            [
                'nama_prodi' => 'Pendidikan Matematika',
                'singkatan' => 'PENDMAT',
                'kode_prodi' => '13016',
                'jumlah_surat' => '65',
            ],
            [
                'nama_prodi' => 'Matematika',
                'singkatan' => 'MAT',
                'kode_prodi' => '13056',
                'jumlah_surat' => '77'
            ],
            [
                'nama_prodi' => 'Statistika',
                'singkatan' => 'STAT',
                'kode_prodi' => '13146',
                'jumlah_surat' => '71'
            ],
            [
                'nama_prodi' => 'Ilmu Komputer',
                'singkatan' => 'ILKOM',
                'kode_prodi' => '13136',
                'jumlah_surat' => '72'
            ],
            
            ];
            foreach ($prodiData as $key => $val){
                prodi::create($val);
            }
    }
}
