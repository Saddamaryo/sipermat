<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuansurat;
use App\Models\Pengajuansurattugas;
use App\Models\pengarsipan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengarsipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastNomorUrut = Pengajuansurat::max('nomor_urut');
        $pengarsipansurat = Pengajuansurat::orderBy('created_at', 'desc')->get();
        return view('admin.pengarsipan', ['lastNomorUrut' => $lastNomorUrut], compact('pengarsipansurat', 'lastNomorUrut'));
    }

    public function arsip_surattugas()
    {
        $lastNomorUrutTugas = Pengajuansurattugas::max('nomor_urut');
        $pengarsipansurattugas = Pengajuansurattugas::orderBy('created_at', 'desc')->get();
        return view('admin.pengarsipansurattugas', compact('pengarsipansurattugas', 'lastNomorUrutTugas'));
    }

    public function tambaharsipsurat(Request $request)
    {
        $uploadsurat = $request->validate(
            [
                'nama_surat' => '',
                'nama_mahasiswa' => '',
                'nomor_surat' => '',
                'nomor_urut' => '',
                'prodi_mahasiswa' => '',
                'nim_mahasiswa' => '',
                'status' => '',
                'formulir1' => '',
                'formulir2' => '',
                'file_acc' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar|max:2040',
            ]
        );
        $currentYear = Carbon::now()->year;
        $nomor_baru = $request->nomor_urut;

        DB::transaction(function () use ($currentYear, $nomor_baru, &$uploadsurat, $request) {
            // Ambil semua data yang dibuat pada tahun ini dan urutkan berdasarkan nomor_urut
            $records = Pengajuansurat::whereYear('created_at', $currentYear)->orderBy('nomor_urut')->get();

            // Reset nomor urut jika tidak ada data di tahun ini
            if ($records->isEmpty()) {
                $nomor_baru = 1;
            } else {
                // Periksa jika nomor baru lebih kecil dari nomor yang ada
                if ($nomor_baru <= $records->last()->nomor_urut) {
                    foreach ($records as $record) {
                        if ($record->nomor_urut >= $nomor_baru) {
                            $record->nomor_urut += 1;
                            $record->save();
                        }
                    }
                }
            }


            $filesuratmasuk = $request->file('file_acc');
            $filename = uniqid() . '.' . $filesuratmasuk->getClientOriginalExtension();
            $filesuratmasuk->storeAs('public/file_acc', $filename);
            $uploadsurat['file_acc'] = $filename;

            // Simpan data baru dengan nomor urut yang sesuai
            Pengajuansurat::create($uploadsurat);
        });
        return back()->with('success', 'Berhasil menambah data arsip surat');
    }

    public function deletearsipsurat($id)
    {
        DB::transaction(function () use ($id) {
            // Temukan surat yang akan dihapus
            $surat = Pengajuansurat::findOrFail($id);
            $nomor_urut_dihapus = $surat->nomor_urut;

            // Hapus surat
            $surat->delete();

            // Kurangi nomor urut yang lebih besar dari nomor urut yang dihapus
            Pengajuansurat::where('nomor_urut', '>', $nomor_urut_dihapus)->decrement('nomor_urut');
        });
        return back()->with('success', 'Berhasil menghapus data arsip surat');
    }


    public function tambaharsipsurattugas(Request $request)
    {
        $uploadsurat = $request->validate(
            [
                'nama_surat' => '',
                'nama_mahasiswa' => '',
                'nomor_surat' => '',
                'nomor_urut' => '',
                'prodi_mahasiswa' => '',
                'nim_mahasiswa' => '',
                'status' => '',
                'formulir1' => '',
                'formulir2' => '',
                'file_acc' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar|max:2040',
            ]
        );
        $currentYear = Carbon::now()->year;
        $nomor_baru = $request->nomor_urut;

        DB::transaction(function () use ($currentYear, $nomor_baru, &$uploadsurat, $request) {
            $records = Pengajuansurattugas::whereYear('created_at', $currentYear)->orderBy('nomor_urut')->get();

            if ($records->isEmpty()) {
                $nomor_baru = 1;
            } else {
                if ($nomor_baru <= $records->last()->nomor_urut) {
                    foreach ($records as $record) {
                        if ($record->nomor_urut >= $nomor_baru) {
                            $record->nomor_urut += 1;
                            $record->save();
                        }
                    }
                }
            }


            $filesuratmasuk = $request->file('file_acc');
            $filename = uniqid() . '.' . $filesuratmasuk->getClientOriginalExtension();
            $filesuratmasuk->storeAs('public/file_acc', $filename);
            $uploadsurat['file_acc'] = $filename;
            Pengajuansurattugas::create($uploadsurat);
        });
        return back()->with('success', 'Berhasil menambah data arsip surat');
    }

    public function deletearsipsurattugas($id)
    {
        DB::transaction(function () use ($id) {
            // Temukan surat yang akan dihapus
            $surat = Pengajuansurattugas::findOrFail($id);
            $nomor_urut_dihapus = $surat->nomor_urut;
    
            // Hapus surat
            $surat->delete();
    
            // Kurangi nomor urut yang lebih besar dari nomor urut yang dihapus
            Pengajuansurattugas::where('nomor_urut', '>', $nomor_urut_dihapus)->decrement('nomor_urut');
        });
        return back()->with('success', 'Berhasil menghapus data arsip surat');
    }


    public function accepting(Request $request, string $id)
    {
        $pengarsipansurat = $request->validate(
            [
                'status' => 'required'
            ]
        );

        Pengajuansurat::find($id)->update($pengarsipansurat);
        $pengajuansurat = Pengajuansurat::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Path file yang akan dihapus
        $filePath = 'public/file_ajuan/' . $pengajuansurat->file_ajuan;

        // Hapus file dari penyimpanan
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }

        return back()->with('success', 'Berhasil melakukan acc terhadap surat yang diajukan');
    }

    public function accepting_tugas(Request $request, string $id)
    {
        $pengarsipansurat = $request->validate(
            [
                'status' => 'required'
            ]
        );

        Pengajuansurattugas::find($id)->update($pengarsipansurat);
        $pengajuansurat = Pengajuansurattugas::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Path file yang akan dihapus
        $filePath = 'public/file_ajuan/' . $pengajuansurat->file_ajuan;

        // Hapus file dari penyimpanan
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }

        return back()->with('success', 'Berhasil melakukan acc terhadap surat yang diajukan');
    }


    public function rejecting(Request $request, string $id)
    {
        try {
            $rejectingsurat = $request->validate(
                [
                    'status' => 'required'
                ]
            );

            $pengajuansurat = Pengajuansurat::find($id);

            if (!$pengajuansurat) {
                return back()->with('error', 'Data pengajuan surat tidak ditemukan.');
            }

            $pengajuansurat->update($rejectingsurat);

            return back()->with('success', 'Berhasil melakukan reject data pengajuan surat mahasiswa');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function rejecting_tugas(Request $request, string $id)
    {
        try {
            $rejectingsurat = $request->validate(
                [
                    'status' => 'required'
                ]
            );

            $pengajuansurat = Pengajuansurattugas::find($id);

            if (!$pengajuansurat) {
                return back()->with('error', 'Data pengajuan surat tidak ditemukan.');
            }

            $pengajuansurat->update($rejectingsurat);

            return back()->with('success', 'Berhasil melakukan reject data pengajuan surat mahasiswa');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    public function uploadmanual(Request $request, string $id)
    {
        $uploadmanual = $request->validate(
            [
                'file_acc' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg|max:2040',
                'status' => 'required'
            ]
        );
        $fileacc = $request->file('file_acc');
        $filename = uniqid() . '.' . $fileacc->getClientOriginalExtension();
        $fileacc->storeAs('public/file_acc', $filename);
        $uploadmanual['file_acc'] = $filename;
        Pengajuansurat::find($id)->update($uploadmanual);
        $pengajuansurat = Pengajuansurat::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Path file yang akan dihapus
        $filePath = 'public/file_ajuan/' . $pengajuansurat->file_ajuan;

        // Hapus file dari penyimpanan
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }

        return back()->with('success', 'Berhasil melakukan upload manual surat');
    }


    public function uploadmanual_tugas(Request $request, string $id)
    {
        $uploadmanual = $request->validate(
            [
                'file_acc' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg|max:2040',
                'status' => 'required'
            ]
        );
        $fileacc = $request->file('file_acc');
        $filename = uniqid() . '.' . $fileacc->getClientOriginalExtension();
        $fileacc->storeAs('public/file_acc', $filename);
        $uploadmanual['file_acc'] = $filename;
        Pengajuansurattugas::find($id)->update($uploadmanual);
        $pengajuansurat = Pengajuansurattugas::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Path file yang akan dihapus
        $filePath = 'public/file_ajuan/' . $pengajuansurat->file_ajuan;

        // Hapus file dari penyimpanan
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }

        return back()->with('success', 'Berhasil melakukan upload manual surat');
    }


    public function riwayatpengajuanmahasiswa()
    {
        $user = Auth::guard('users')->user()->id;
        $arsip = Pengajuansurat::where('id_user', $user)->get()->count();
        $arsips = Pengajuansurat::where('id_user', $user)->where('status', 'Selesai')->get();
        return view('user.riwayatpengajuan', compact('arsip', 'arsips'));
    }

    public function riwayatpengajuantugasmhs()
    {
        $user = Auth::guard('users')->user()->id;
        $arsip = Pengajuansurattugas::where('id_user', $user)->get()->count();
        $arsips = Pengajuansurattugas::where('id_user', $user)->where('status', 'Selesai')->get();
        return view('user.riwayatpengajuantugas', compact('arsip', 'arsips'));
    }

    public function downloadfile($id)
    {
        $authenticatedUser = Auth::guard('users')->user();

        if (!$authenticatedUser) {
            return redirect()->route('user_login')->with('error', 'Harus login terlebih dahulu untuk bisa mengakses laman ini.');
        }
        $item = Pengajuansurat::find($id);
        $filePath = storage_path("app/public/file_acc/{$item->file_acc}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_acc);
        } else {
            abort(404, 'File not found');
        }
    }
    public function downloadfile_tugas($id)
    {
        $authenticatedUser = Auth::guard('users')->user();

        if (!$authenticatedUser) {
            return redirect()->route('user_login')->with('error', 'Harus melakukan login terlebih dahulu untuk mengakses laman ini.');
        }
        $item = Pengajuansurattugas::find($id);
        $filePath = storage_path("app/public/file_acc/{$item->file_acc}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_acc);
        } else {
            abort(404, 'File not found');
        }
    }

    public function downloadfile_admin($id)
    {
        $authenticatedUser = Auth::guard('dataadmin')->user();

        if (!$authenticatedUser) {
            return redirect()->route('admin_login')->with('error', 'Harus melakukan login terlebih dahulu untuk mengakses laman ini.');
        }
        $item = Pengajuansurat::find($id);
        $filePath = storage_path("app/public/file_acc/{$item->file_acc}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_acc);
        } else {
            abort(404, 'File not found');
        }
    }
    public function downloadfile_admintugas($id)
    {
        $authenticatedUser = Auth::guard('dataadmin')->user();

        if (!$authenticatedUser) {
            return redirect()->route('admin_login')->with('error', 'Harus melakukan login terlebih dahulu.');
        }
        $item = Pengajuansurattugas::find($id);
        $filePath = storage_path("app/public/file_acc/{$item->file_acc}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_acc);
        } else {
            abort(404, 'File not found');
        }
    }



    public function downloadfile_kaprodi($id)
    {
        $authenticatedUser = Auth::guard('kaprodi')->user();

        if (!$authenticatedUser) {
            return redirect()->route('kaprodi_login')->with('error', 'Harus melakukan login terlebih dahulu.');
        }
        $item = Pengajuansurat::find($id);
        $filePath = storage_path("app/public/file_acc/{$item->file_acc}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_acc);
        } else {
            abort(404, 'File not found');
        }
    }

    public function downloadfile_kaproditugas($id)
    {
        $authenticatedUser = Auth::guard('kaprodi')->user();

        if (!$authenticatedUser) {
            return redirect()->route('kaprodi_login')->with('error', 'Harus melakukan login terlebih dahulu.');
        }
        $item = Pengajuansurattugas::find($id);
        $filePath = storage_path("app/public/file_acc/{$item->file_acc}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_acc);
        } else {
            abort(404, 'File not found');
        }
    }
}
