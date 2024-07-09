<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Models\suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{

    public function index()
    {
        return view('admin.suratmasuk', [
            'suratmasuk' => suratmasuk::get()
        ]);
    }


    public function store(Request $request)
    {
        $uploadsuratmasuk = $request->validate(
            [
                'nama_surat' => '',
                'nama_mahasiswa' => '',
                'nomor_surat' => '',
                'prodi_mahasiswa' => '',
                'nim_mahasiswa' => '',
                'nomor_user' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'file_suratmasuk' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar|max:2040',
            ]
        );
        $filesuratmasuk = $request->file('file_suratmasuk');
        $filename = uniqid() . '.' . $filesuratmasuk->getClientOriginalExtension();
        $filesuratmasuk->storeAs('public/file_suratmasuk', $filename);
        $uploadsuratmasuk['file_suratmasuk'] = $filename;
        suratmasuk::create($uploadsuratmasuk);
        return back()->with('success', 'Berhasil menambah data arsip surat masuk');
    }


    public function downloadfile_suratmasuk($id)
    {
        $authenticatedUser = Auth::guard('dataadmin')->user();

        if (!$authenticatedUser) {
            return redirect()->route('admin_login')->with('error', 'Harus melakukan login terlebih dahulu.');
        }
        $item = suratmasuk::find($id);
        $filePath = storage_path("app/public/file_suratmasuk/{$item->file_suratmasuk}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_suratmasuk);
        } else {
            abort(404, 'File not found');
        }
    }

    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'nama_surat' => '',
                'nama_mahasiswa' => '',
                'nomor_surat' => '',
                'prodi_mahasiswa' => '',
                'nim_mahasiswa' => '',
                'nomor_user' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'file_suratmasuk' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar|max:2040',
            ]
        );

        // Cari surat masuk berdasarkan ID
        $suratmasuk = suratmasuk::find($id);
        if (!$suratmasuk) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
        Storage::delete('public/file_suratmasuk/'.$suratmasuk->file_suratmasuk);

        // Update data surat masuk
        $suratmasuk->nama_surat = $request->nama_surat;
        $suratmasuk->nama_mahasiswa = $request->nama_mahasiswa;
        $suratmasuk->nomor_surat = $request->nomor_surat;
        $suratmasuk->prodi_mahasiswa = $request->prodi_mahasiswa;
        $suratmasuk->nim_mahasiswa = $request->nim_mahasiswa;
        $suratmasuk->nomor_user = $request->nomor_user;

        // Proses file upload
        if ($request->hasFile('file_suratmasuk')) {
            $file = $request->file('file_suratmasuk');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/file_suratmasuk', $filename);
            $suratmasuk->file_suratmasuk = $filename;
        }

        $suratmasuk->save();
        return back()->with('success', 'Berhasil mengupdate data arsip surat masuk');
    }


    public function destroy($id)
    {
        // Cari surat masuk berdasarkan ID
        $suratmasuk = suratmasuk::find($id);
        if (!$suratmasuk) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Path file yang akan dihapus
        $filePath = 'public/file_suratmasuk/' . $suratmasuk->file_suratmasuk;

        // Hapus file dari penyimpanan
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }

        // Hapus data dari database
        $suratmasuk->delete();

        return back();
    }
}
