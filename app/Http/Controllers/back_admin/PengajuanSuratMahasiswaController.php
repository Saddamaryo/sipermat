<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuansurat;
use App\Models\Pengajuansurattugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanSuratMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuspengajuan = ['Menunggu', 'Ditolak', 'Diproses'];
        $pengajuansurat = Pengajuansurat::whereIn('status', $statuspengajuan)->get();
        $lastNomorUrut = Pengajuansurat::max('nomor_urut');
        $lastNomorUrutTugas = Pengajuansurattugas::max('nomor_urut');
        $pengajuansurattugas = Pengajuansurattugas::whereIn('status', $statuspengajuan)->get();
        return view('admin.pengajuan', compact('pengajuansurat', 'lastNomorUrut', 'pengajuansurattugas', 'lastNomorUrutTugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengajuansurat = $request->validate(
            [
                'id_surat' => 'required',
                'id_user' => 'required',
                'nama_surat' => 'required',
                'nama_mahasiswa' => 'required',
                'nomor_surat' => 'required',
                'prodi_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required',
                'nomor_user' => 'required',
                'nomor_urut' => '',
                'slug' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'formulir5' => '',
                'formulir6' => '',
                'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg',
                'nama_file_ajuan' => '',
                'file_acc' => '',
                'nama_file_cc' => '',
                'status' => ''
            ]
        );

        if ($request->hasFile('file_ajuan')) {
            $fileacc = $request->file('file_ajuan');
            $filename = uniqid() . '.' . $fileacc->getClientOriginalExtension();
            $fileacc->storeAs('public/file_ajuan', $filename);
            $pengajuansurat['file_ajuan'] = $filename;
            Pengajuansurat::create($pengajuansurat);
        } else {
            Pengajuansurat::create($pengajuansurat);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'id_surat' => 'required',
                'id_user' => 'required',
                'nama_surat' => 'required',
                'nama_mahasiswa' => 'required',
                'nomor_surat' => 'required',
                'prodi_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required',
                'nomor_user' => 'required',
                'nomor_urut_lain' => '',
                'slug' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'formulir5' => '',
                'formulir6' => '',
                'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar',
                'status' => '',
                'nama_file_ajuan' => '',
                'file_acc' => '',
                'nama_file_cc' => '',
            ]
        );

        // Cari surat masuk berdasarkan ID
        $pengajuansurat = Pengajuansurat::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Proses file upload
        if ($request->hasFile('file_ajuan')) {
            Storage::delete('public/file_ajuan/' . $pengajuansurat->file_ajuan);
            $file_ajuan = $request->file('file_ajuan');
            $filename = uniqid() . '.' . $file_ajuan->getClientOriginalExtension();
            $file_ajuan->storeAs('public/file_ajuan', $filename);
            $pengajuansurat->file_ajuan = $filename;
        }

        // Update data
        $pengajuansurat->update([
            'id_surat' => $request->id_surat,
            'id_user' => $request->id_user,
            'nama_surat' => $request->nama_surat,
            'slug' => $request->slug,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nomor_surat' => $request->nomor_surat,
            'prodi_mahasiswa' => $request->prodi_mahasiswa,
            'nim_mahasiswa' => $request->nim_mahasiswa,
            'nomor_user' => $request->nomor_user,
            'formulir1' => $request->formulir1,
            'formulir2' => $request->formulir2,
            'formulir3' => $request->formulir3,
            'formulir4' => $request->formulir4,
            'formulir5' => $request->formulir5,
            'formulir6' => $request->formulir6,
            'status' => $request->status,
        ]);



        return back()->with('success', 'Berhasil melakukan update data pengajuan surat dan mengirim ke akun kaprodi');
    }

    public function update_tugas(Request $request, string $id)
    {
        $request->validate(
            [
                'id_surat' => 'required',
                'id_user' => 'required',
                'nama_surat' => 'required',
                'nama_mahasiswa' => 'required',
                'nomor_surat' => 'required',
                'prodi_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required',
                'nomor_user' => 'required',
                'nomor_urut' => '',
                'nomor_urut_lain' => '',
                'slug' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'formulir5' => '',
                'formulir6' => '',
                'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar',
                'status' => '',
                'nama_file_ajuan' => '',
                'file_acc' => '',
                'nama_file_cc' => '',
            ]
        );

        // Cari surat masuk berdasarkan ID
        $pengajuansurat = Pengajuansurattugas::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
        // Proses file upload
        if ($request->hasFile('file_ajuan')) {
            Storage::delete('public/file_ajuan/' . $pengajuansurat->file_ajuan);
            $file_ajuan = $request->file('file_ajuan');
            $filename = uniqid() . '.' . $file_ajuan->getClientOriginalExtension();
            $file_ajuan->storeAs('public/file_ajuan', $filename);
            $pengajuansurat->file_ajuan = $filename;
        }

        // Update data
        $pengajuansurat->update([
            'id_surat' => $request->id_surat,
            'id_user' => $request->id_user,
            'nama_surat' => $request->nama_surat,
            'slug' => $request->slug,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nomor_surat' => $request->nomor_surat,
            'prodi_mahasiswa' => $request->prodi_mahasiswa,
            'nim_mahasiswa' => $request->nim_mahasiswa,
            'nomor_user' => $request->nomor_user,
            'formulir1' => $request->formulir1,
            'formulir2' => $request->formulir2,
            'formulir3' => $request->formulir3,
            'formulir4' => $request->formulir4,
            'formulir5' => $request->formulir5,
            'formulir6' => $request->formulir6,
            'status' => $request->status,
            'nomor_urut' => $request->nomor_urut

        ]);


        return back()->with('success', 'Berhasil melakukan update data pengajuan surat dan mengirim ke akun kaprodi');
    }

    public function ajukankaprodi(Request $request, string $id)
    {
        $request->validate(
            [
                'id_surat' => 'required',
                'id_user' => 'required',
                'nama_surat' => 'required',
                'nama_mahasiswa' => 'required',
                'nomor_surat' => 'required',
                'prodi_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required',
                'nomor_user' => 'required',
                'slug' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'formulir5' => '',
                'formulir6' => '',
                'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar',
                'status' => '',
                'nama_file_ajuan' => '',
                'file_acc' => '',
                'nama_file_cc' => '',
            ]
        );


        // Cari surat masuk berdasarkan ID
        $pengajuansurat = Pengajuansurat::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Ambil tahun saat ini
        $currentYear = Carbon::now()->year;
        $nomor_baru = $request->nomor_urut;

        DB::transaction(function () use ($currentYear, $nomor_baru, &$pengajuansurat, $request) {
            // Ambil semua data yang dibuat pada tahun ini dan urutkan berdasarkan nomor_urut
            $records = Pengajuansurat::whereYear('created_at', $currentYear)->orderBy('nomor_urut')->get();

            // Reset nomor urut jika tidak ada data di tahun ini
            if ($records->isEmpty() || $nomor_baru === null) {
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

            // Proses file upload
            /*if ($request->hasFile('file_ajuan')) {
                Storage::delete('public/file_ajuan/' . $pengajuansurat->file_ajuan);
                $file_ajuan = $request->file('file_ajuan');
                $filename = uniqid() . '.' . $file_ajuan->getClientOriginalExtension();
                $file_ajuan->storeAs('public/file_ajuan', $filename);
                $pengajuansurat->file_ajuan = $filename;
            }*/

            // Update data
            $pengajuansurat->update([
                'id_surat' => $request->id_surat,
                'id_user' => $request->id_user,
                'nama_surat' => $request->nama_surat,
                'slug' => $request->slug,
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'nomor_surat' => $request->nomor_surat,
                'prodi_mahasiswa' => $request->prodi_mahasiswa,
                'nim_mahasiswa' => $request->nim_mahasiswa,
                'nomor_user' => $request->nomor_user,
                'formulir1' => $request->formulir1,
                'formulir2' => $request->formulir2,
                'formulir3' => $request->formulir3,
                'formulir4' => $request->formulir4,
                'formulir5' => $request->formulir5,
                'formulir6' => $request->formulir6,
                'nomor_urut' => $nomor_baru,
            ]);
        });


        return back()->with('success', 'Nomor surat berhasil dibuat');
    }


    public function ajukankaproditugas(Request $request, string $id)
    {
        $request->validate(
            [
                'id_surat' => 'required',
                'id_user' => 'required',
                'nama_surat' => 'required',
                'nama_mahasiswa' => 'required',
                'nomor_surat' => 'required',
                'prodi_mahasiswa' => 'required',
                'nim_mahasiswa' => 'required',
                'nomor_user' => 'required',
                'slug' => '',
                'formulir1' => '',
                'formulir2' => '',
                'formulir3' => '',
                'formulir4' => '',
                'formulir5' => '',
                'formulir6' => '',
                'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar',
                'nama_file_ajuan' => '',
                'file_acc' => '',
                'nama_file_cc' => '',
            ]
        );


        // Cari surat masuk berdasarkan ID
        $pengajuansurat = Pengajuansurattugas::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        // Ambil tahun saat ini
        $currentYear = Carbon::now()->year;
        $nomor_baru = $request->nomor_urut;

        DB::transaction(function () use ($currentYear, $nomor_baru, &$pengajuansurat, $request) {
            // Ambil semua data yang dibuat pada tahun ini dan urutkan berdasarkan nomor_urut
            $records = Pengajuansurat::whereYear('created_at', $currentYear)->orderBy('nomor_urut')->get();

            // Reset nomor urut jika tidak ada data di tahun ini
            if ($records->isEmpty() || $nomor_baru === null) {
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

            /*// Proses file upload
            if ($request->hasFile('file_ajuan')) {
                Storage::delete('public/file_ajuan/' . $pengajuansurat->file_ajuan);
                $file_ajuan = $request->file('file_ajuan');
                $filename = uniqid() . '.' . $file_ajuan->getClientOriginalExtension();
                $file_ajuan->storeAs('public/file_ajuan', $filename);
                $pengajuansurat->file_ajuan = $filename;
            }*/

            // Update data
            $pengajuansurat->update([
                'id_surat' => $request->id_surat,
                'id_user' => $request->id_user,
                'nama_surat' => $request->nama_surat,
                'slug' => $request->slug,
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'nomor_surat' => $request->nomor_surat,
                'prodi_mahasiswa' => $request->prodi_mahasiswa,
                'nim_mahasiswa' => $request->nim_mahasiswa,
                'nomor_user' => $request->nomor_user,
                'formulir1' => $request->formulir1,
                'formulir2' => $request->formulir2,
                'formulir3' => $request->formulir3,
                'formulir4' => $request->formulir4,
                'formulir5' => $request->formulir5,
                'formulir6' => $request->formulir6,
                'nomor_urut' => $nomor_baru,
            ]);
        });


        return back()->with('success', 'Berhasil melakukan update data pengajuan surat dan mengirim ke akun kaprodi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            // Temukan surat yang akan dihapus
            $surat = Pengajuansurat::findOrFail($id);
            if (!$surat) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }
            $nomor_urut_dihapus = $surat->nomor_urut;

            // Path file yang akan dihapus
            $filePath = 'public/file_ajuan/' . $surat->file_ajuan;

            // Hapus file dari penyimpanan
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            } else {
                return response()->json(['message' => 'File tidak ditemukan.'], 404);
            }

            // Hapus data dari database
            $surat->delete();
            // Kurangi nomor urut yang lebih besar dari nomor urut yang dihapus
            Pengajuansurat::where('nomor_urut', '>', $nomor_urut_dihapus)->decrement('nomor_urut');
        });

        return back()->with('success', 'Berhasil melakukan delete data pengajuan surat dan nomor surat terupdate otomatis');
    }

    public function delete_tugas(string $id)
    {
        DB::transaction(function () use ($id) {
            // Temukan surat yang akan dihapus
            $surat = Pengajuansurattugas::findOrFail($id);
            if (!$surat) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }
            $nomor_urut_dihapus = $surat->nomor_urut;

            // Path file yang akan dihapus
            $filePath = 'public/file_ajuan/' . $surat->file_ajuan;

            // Hapus file dari penyimpanan
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            } else {
                return response()->json(['message' => 'File tidak ditemukan.'], 404);
            }

            // Hapus data dari database
            $surat->delete();
            // Kurangi nomor urut yang lebih besar dari nomor urut yang dihapus
            Pengajuansurattugas::where('nomor_urut', '>', $nomor_urut_dihapus)->decrement('nomor_urut');
        });



        return back()->with('success', 'Berhasil melakukan delete data pengajuan surat dan nomor surat terupdate otomatis');
    }


    public function downloadfile_ajuan($id)
    {
        $authenticatedUser = Auth::guard('dataadmin')->user();

        if (!$authenticatedUser) {
            return redirect()->route('admin_login')->with('error', 'Harus melakukan login terlebih dahulu.');
        }
        $item = Pengajuansurat::find($id);
        $filePath = storage_path("app/public/file_ajuan/{$item->file_ajuan}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_ajuan);
        } else {
            abort(404, 'File not found');
        }
    }

    public function downloadfile_ajuantugas($id)
    {
        $authenticatedUser = Auth::guard('dataadmin')->user();

        if (!$authenticatedUser) {
            return redirect()->route('admin_login')->with('error', 'Harus melakukan login terlebih dahulu.');
        }
        $item = Pengajuansurattugas::find($id);
        $filePath = storage_path("app/public/file_ajuan/{$item->file_ajuan}");
        if (file_exists($filePath)) {
            return response()->download($filePath, $item->file_ajuan);
        } else {
            abort(404, 'File not found');
        }
    }
}
