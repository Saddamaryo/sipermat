<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Models\Dataadmin;
use App\Models\Pengajuansurat;
use App\Models\Pengajuansurattugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dataadmin', [
            'dataadmin' => Dataadmin::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataadmin = $request->validate(
            [
                'nama_admin' => 'required',
                'email' => 'required|email|unique:dataadmin,email',
                'nomor_admin' => 'required',
                'password' => 'required',
            ],
            [
                'nama_admin.required' => 'Nama admin harus diisi.',
                'email.required' => 'Email harus diisi.',
                'nomor_admin.required' => 'Nomor admin harus diisi.',
                'password.required' => 'Password harus diisi.',
            ]
        );
        Dataadmin::create($request->all());
        return back()->with('success', 'Berhasil menambah data admin');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataadmin = $request->validate(
            [
                'nama_admin' => 'required',
                'email' => 'required|email|unique:dataadmin,email',
                'nomor_admin' => 'required',
                'password' => 'required',
            ],
            [
                // Pesan custom untuk setiap validasi
                'nama_admin.required' => 'Nama admin harus diisi.',
                'email.required' => 'Email harus diisi.',
                'nomor_admin.required' => 'Nomor admin harus diisi.',
            ]
        );
        Dataadmin::find($id)->update($dataadmin);
        return back()->with('success', 'Berhasil melakukan update data admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dataadmin::find($id)->delete();
        return back()->with('success', 'Berhasil melakukan delete data admin');
    }

    public function loginadmin()
    {
        return view('admin.loginadmin');
    }

    public function login_submit(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        $credentials = $request->only('email', 'password');
        if (Auth::guard('dataadmin')->attempt($credentials)) {
            $user = Dataadmin::where('email', $request->input('email'))->first();
            Auth::guard('dataadmin')->login($user);
            return redirect()->route('admin_dashboard')->with('success', 'Anda berhasil untuk login sebagai admin');
        } else {
            return redirect()->route('admin_login')->with('error', 'Login gagal, periksa kembali data yang anda masukkan');
        }
    }


    public function dashboard()
    {
        $statuspengajuan = 'Menunggu';
        $statusprocess = 'Diproses';

        // Menghitung jumlah pengajuan surat yang sedang diproses
        if (Schema::hasColumn('pengajuansurats', 'status')) {
            $suratmenyuratprocess = Pengajuansurat::where('status', $statusprocess)->count();
        } else {
            $suratmenyuratprocess = 0;
        }

        // Menghitung jumlah pengajuan surat tugas yang sedang diproses
        if (Schema::hasColumn('pengajuansurattugas', 'status')) {
            $surattugasprocess = Pengajuansurattugas::where('status', $statusprocess)->count();
        } else {
            $surattugasprocess = 0;
        }

        // Menghitung jumlah pengajuan surat yang menunggu persetujuan
        if (Schema::hasColumn('pengajuansurats', 'status')) {
            $suratmenyurat = Pengajuansurat::where('status', $statuspengajuan)->count();
        } else {
            $suratmenyurat = 0;
        }

        // Menghitung jumlah pengajuan surat tugas yang menunggu persetujuan
        if (Schema::hasColumn('pengajuansurattugas', 'status')) {
            $surattugas = Pengajuansurattugas::where('status', $statuspengajuan)->count();
        } else {
            $surattugas = 0;
        }

        // Menghitung total mahasiswa
        $totalmahasiswa = User::count();

        // Menghitung total pengajuan surat tugas
        $totalsurattugas = Pengajuansurattugas::count();

        // Menghitung total pengajuan surat mahasiswa
        $totalsuratmahasiswa = Pengajuansurat::count();

        return view('admin.dashboard', compact(
            'statuspengajuan',
            'suratmenyuratprocess',
            'surattugasprocess',
            'surattugas',
            'suratmenyurat',
            'totalmahasiswa',
            'totalsurattugas',
            'totalsuratmahasiswa'
        ));
    }



    public function logout()
    {
        Auth::guard('dataadmin')->logout();
        return redirect()->route('admin_login')->with('success', 'Logout berhasil');
    }
}
