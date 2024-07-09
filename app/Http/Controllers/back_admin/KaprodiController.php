<?php

namespace App\Http\Controllers\back_admin;
use App\Http\Controllers\Controller;
use App\Models\Kaprodi;
use Illuminate\Http\Request;
use App\Models\Kategorisurat;
use App\Models\Pengajuansurat;
use App\Models\Pengajuansurattugas;
use App\Models\pengarsipan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class KaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kaprodi', [
            'kaprodi' => Kaprodi::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    /*
    public function store(Request $request)
    {
        $kaprodi = $request->validate(
            ['nama_kaprodi' => 'required',
            'nip_kaprodi' => 'required',
            'prodi_kaprodi' => 'required',
            'email' => 'required',
            'password' => 'required',
            'file_ttd' => 'required|file|mimes:png,jpg,jpeg'
        ]
        );
        if ($request->hasFile('file_ttd')) {
            $fileacc = $request->file('file_ttd');
            $filename = uniqid() . '.' . $fileacc->getClientOriginalExtension();
            $fileacc->storeAs('public/file_ttd', $filename);
            $kaprodi['file_ttd'] = $filename;
            Kaprodi::create($kaprodi);
        } else {
            Kaprodi::create($kaprodi);
        }
        return back()->with('success', 'Berhasil menambahkan data kaprodi');
    }*/
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['nama_kaprodi' => 'required',
            'nip_kaprodi' => 'required',
            'prodi_kaprodi' => 'required',
            'email' => 'required',
            'password' => 'required',
            'file_ttd' => 'file|mimes:png,jpg,jpeg'
        ]
        );
        $kaprodi = Kaprodi::find($id);
        if (!$kaprodi) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        if ($request->hasFile('file_ttd')) {
            Storage::delete('public/file_ttd/' . $kaprodi->file_ttd);
            $file_ttd = $request->file('file_ttd');
            $file_ttd->storeAs('public/file_ttd', $file_ttd->hashName());
            $kaprodi->update([
                'nama_kaprodi' => $request->nama_kaprodi,
                'nip_kaprodi' => $request->nip_kaprodi,
                'prodi_kaprodi' => $request->prodi_kaprodi,
                'email' => $request->email,
                'password' => $request->password,
                'file_ttd' => $file_ttd->hashName(),
            ]);
        } else {
            $kaprodi->update([
                'nama_kaprodi' => $request->nama_kaprodi,
                'nip_kaprodi' => $request->nip_kaprodi,
                'prodi_kaprodi' => $request->prodi_kaprodi,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        }

        return back()->with('success', 'Berhasil update data kaprodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    /*
    public function destroy(string $id)
    {
        // Cari surat masuk berdasarkan ID
       $kaprodi = Kaprodi::find($id);
       if (!$kaprodi) {
           return response()->json(['message' => 'Data tidak ditemukan.'], 404);
       }

       // Path file yang akan dihapus
       $filePath = 'public/file_ttd/' . $kaprodi->file_ttd;

       // Hapus file dari penyimpanan
       if (Storage::exists($filePath)) {
           Storage::delete($filePath);
       } else {
           return response()->json(['message' => 'File tidak ditemukan.'], 404);
       }

       // Hapus data dari database
       $kaprodi->delete();

       return back();
    }*/
    


    //LOGIN KAPRODI
    public function loginkaprodi(){
        return view('kaprodi.loginkaprodi');
    }

    public function login_submit(Request $request) {
            
        $request->validate(
            ['nip_kaprodi' => 'required',
            'password' =>'required'
            ]
        );
        $credentials = $request->only('nip_kaprodi', 'password');
        if (Auth::guard('kaprodi')->attempt($credentials)){
            $kaprodi = Kaprodi::where('nip_kaprodi', $request->input('nip_kaprodi'))->first();
            Auth::guard('kaprodi')->login($kaprodi);
            return redirect()->route('dashboard_kaprodi')->with('success', 'Login berhasil');
        }
        else{
            return redirect()->route('kaprodi_login')->with('error', 'Login gagal, periksa kembali data yang anda masukkan');
        }
    }

    public function pengajuansuratkaprodi(){
        $user = Auth::guard('kaprodi')->user()->prodi_kaprodi;
        $count = Kaprodi::where('prodi_kaprodi', $user)->get();
        $counts = Pengajuansurat::where('prodi_mahasiswa', $user)->where('status', 'Diproses')->get();
        $pengajuansurattugas = Pengajuansurattugas::where('prodi_mahasiswa', $user)->where('status', 'Diproses')->get();
        return view('kaprodi.pengajuansuratkaprodi', compact('count', 'counts','pengajuansurattugas'));
    }

    public function pengarsipansuratkaprodi() {
        $user = Auth::guard('kaprodi')->user()->prodi_kaprodi;
        $count = Kaprodi::where('prodi_kaprodi', $user)->orderBy('created_at', 'desc')->get();
        $counts = Pengajuansurat::where('prodi_mahasiswa', $user)->where('status', 'Selesai')->orderBy('created_at', 'desc')->get();
        $pengajuansurattugas = Pengajuansurattugas::where('prodi_mahasiswa', $user)->where('status', 'Selesai')->orderBy('created_at', 'desc')->get();
        return view('kaprodi.arsipsuratkaprodi', compact('count', 'counts', 'pengajuansurattugas'));
    }    
    public function pengarsipansurattugaskaprodi() {
        $user = Auth::guard('kaprodi')->user()->prodi_kaprodi;
        $count = Kaprodi::where('prodi_kaprodi', $user)->orderBy('created_at', 'desc')->get();
        #$counts = Pengajuansurat::where('prodi_mahasiswa', $user)->where('status', 'Accepted')->orderBy('created_at', 'desc')->get();
        $pengajuansurattugas = Pengajuansurattugas::where('prodi_mahasiswa', $user)->where('status', 'Selesai')->orderBy('created_at', 'desc')->get();
        return view('kaprodi.arsipsurattugaskaprodi', compact('count', 'pengajuansurattugas'));
    }    

    public function logout(){
        Auth::guard('kaprodi')->logout();
        return redirect()->route('kaprodi_login')->with('success', 'Logout berhasil');
    }



    public function dashboard_kaprodi() {
        // Mendapatkan prodi dari user yang sedang login
        $prodikaprodi = Auth::guard('kaprodi')->user()->prodi_kaprodi;
    
        // Status pengajuan yang digunakan dalam query
        $statuspengajuan = 'Menunggu';
        $statusprocess = 'Diproses';
        $statussah = 'Selesai';
    
        // Menghitung jumlah pengajuan surat yang sedang diproses untuk prodi tertentu
        if (Schema::hasColumn('pengajuansurats', 'status') && Schema::hasColumn('pengajuansurats', 'prodi_mahasiswa')) {
            $suratmenyuratprocess = Pengajuansurat::where('status', $statusprocess)
                                                  ->where('prodi_mahasiswa', $prodikaprodi)
                                                  ->count();
        } else {
            $suratmenyuratprocess = 0;
        }
    
        // Menghitung jumlah pengajuan surat tugas yang sedang diproses untuk prodi tertentu
        if (Schema::hasColumn('pengajuansurattugas', 'status') && Schema::hasColumn('pengajuansurattugas', 'prodi_mahasiswa')) {
            $surattugasprocess = Pengajuansurattugas::where('status', $statusprocess)
                                                    ->where('prodi_mahasiswa', $prodikaprodi)
                                                    ->count();
        } else {
            $surattugasprocess = 0;
        }
    
        // Menghitung total mahasiswa untuk prodi tertentu dengan pengecekan kolom
        if (Schema::hasColumn('users', 'status') && Schema::hasColumn('users', 'prodi_mahasiswa')) {
            $totalmahasiswa = User::where('prodi_mahasiswa', $prodikaprodi)
                                  ->where('status', $statussah)
                                  ->count();
        } else {
            $totalmahasiswa = 0;
        }
    
        // Menghitung total pengajuan surat tugas untuk prodi tertentu
        if (Schema::hasColumn('pengajuansurattugas', 'prodi_mahasiswa')) {
            $totalsurattugas = Pengajuansurattugas::where('prodi_mahasiswa', $prodikaprodi)->count();
        } else {
            $totalsurattugas = 0;
        }
    
        // Menghitung total pengajuan surat untuk prodi tertentu dengan pengecekan kolom
        if (Schema::hasColumn('pengajuansurats', 'status') && Schema::hasColumn('pengajuansurats', 'prodi_mahasiswa')) {
            $totalsuratmahasiswa = Pengajuansurat::where('prodi_mahasiswa', $prodikaprodi)
                                                 ->where('status', $statussah)
                                                 ->count();
        } else {
            $totalsuratmahasiswa = 0;
        }
    
        // Mengembalikan view dengan data yang telah dihitung
        return view('kaprodi.dashboardkaprodi', compact(
            'statuspengajuan', 
            'suratmenyuratprocess',
            'surattugasprocess', 
            'totalmahasiswa', 
            'totalsurattugas', 
            'totalsuratmahasiswa'
        ));
    }

}
    
