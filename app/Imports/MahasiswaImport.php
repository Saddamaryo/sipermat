<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nama_mahasiswa' => $row['nama_mahasiswa'],
            'email' => $row['email'], 
            'nim_mahasiswa' => $row['nim_mahasiswa'],
            'prodi_mahasiswa' => $row['prodi_mahasiswa'],
            'password' => $row ['password']
        ]);
    }
}
