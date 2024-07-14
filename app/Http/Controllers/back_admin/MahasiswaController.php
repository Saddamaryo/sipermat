<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Imports\MahasiswaImport;
use App\Models\mahasiswa;
use App\Models\user;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mahasiswa', [
            'user' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate(
            [
                'nama_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required|unique:users,nim_mahasiswa',
                'prodi_mahasiswa' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
            ]
        );
        User::create($user);
        return back()->with('success', 'Berhasil menambah data dan akun mahasiswa');;
    }


    public function importmhs(Request $request)
    {
        $request->validate([
            'file_mahasiswa' => 'required|file|mimes:xls,xlsx'
        ]);
    
        try {
            $path = $request->file('file_mahasiswa')->getRealPath();
            $data = Excel::toArray(new MahasiswaImport, $path)[0];
    
            DB::beginTransaction();
    
            foreach ($data as $row) {
                $existingUser = User::where('email', $row['email'])->orWhere('nim_mahasiswa', $row['nim_mahasiswa'])->first();
                if ($existingUser) {
                    return back()->with('error', 'Email atau NIM sudah ada dalam database.');
                }
    
                // Validasi prodi_mahasiswa
                $allowedProdi = ["Ilmu Komputer", "Pendidikan Matematika", "Matematika", "Statistika"];
                if (!in_array($row['prodi_mahasiswa'], $allowedProdi)) {
                    return back()->with('error', 'Prodi mahasiswa harus salah satu dari: Ilmu Komputer, Pendidikan Matematika, Matematika, Statistika.');
                }
    
                User::create([
                    'nama_mahasiswa' => $row['nama_mahasiswa'],
                    'nim_mahasiswa' => $row['nim_mahasiswa'],
                    'prodi_mahasiswa' => $row['prodi_mahasiswa'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                ]);
            }
    
            DB::commit();
    
            return back()->with('success', 'Berhasil menambah data mahasiswa secara masal');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambah data mahasiswa.');
        }
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->validate(
            [
                'nama_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required',
                'prodi_mahasiswa' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]
        );
        User::find($id)->update($user);
        return back()->with('success', 'Berhasil melakukan update data mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return back()->with('success', 'Berhasil melakukan delete data mahasiswa');
    }
}
