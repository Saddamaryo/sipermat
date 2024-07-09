<?php

namespace App\Http\Controllers\back_user;

use App\Http\Controllers\Controller;
use App\Models\Kaprodi;
use App\Models\Kategorisurat;
use App\Models\Nomorsurat;
use App\Models\Pengajuansurat;
use App\Models\Pengajuansurattugas;
use App\Models\pengarsipan;
use App\Models\pimpinan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengajuanSuratmhsController extends Controller
{

    public function details($id)
    {
        $data = Kategorisurat::findOrFail($id);
        return view('user.detailsurat', compact('data'));
    }

    #DOWNLOAD SURAT CONTROLLER
    public function cekexportilkom($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', ' Ilmu Komputer')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Ilmu Komputer')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function cekexportpenmat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', 'Pendidikan Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Pendidikan Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function cekexportstat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', 'Statistika')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Statistika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function cekexportmat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', 'Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function exporttugasmat($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function exporttugasilkom($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Ilmu Komputer')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Ilmu Komputer')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        }
    }
    public function exporttugaspenmat($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Pendidikan Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Ilmu Komputer')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        }
    }
    public function exporttugasstat($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Statistika')->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Statistika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        }
    }





    #PREVIEW SURAT CONTROLLER
    public function previewilkom($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', ' Ilmu Komputer')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Ilmu Komputer')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function previewpenmat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', 'Pendidikan Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Pendidikan Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }


    public function previewstat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', 'Statistika')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Statistika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function previewmat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', 'Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function previewilkomtugas($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', ' Ilmu Komputer')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Ilmu Komputer')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function previewpenmattugas($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Pendidikan Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Pendidikan Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function previewstattugas($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Statistika')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Statistika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }

    public function previewmattugas($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', 'Matematika')->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', 'Matematika')->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }


    #DOWNLOAD SURAT MAHASISWA
    public function exportpdf($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $user = Auth::guard('users')->user()->prodi_mahasiswa;
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', $user)->get();
        $ceksurat1 = $cekdata->slug;
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', $user)->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }
    public function exportpdftugas($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $user = Auth::guard('users')->user()->prodi_mahasiswa;
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', $user)->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', $user)->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }


    #PREVIEWSURATMAHASISWA
    public function previewsurat($id)
    {
        $cekdata = Pengajuansurat::findOrFail($id);
        $user = Auth::guard('users')->user()->prodi_mahasiswa;
        $cekprodi = Pengajuansurat::where('prodi_mahasiswa', $user)->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', $user)->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }
    public function previewsurattugas($id)
    {
        $cekdata = Pengajuansurattugas::findOrFail($id);
        $user = Auth::guard('users')->user()->prodi_mahasiswa;
        $cekprodi = Pengajuansurattugas::where('prodi_mahasiswa', $user)->get();
        $ceksurat1 = $cekdata->slug;
        //$kuy = pimpinan::Select('pimpinan')->where('prodi_pimpinan', '=', $user)->first();
        $prodikaprodi = Kaprodi::where('prodi_kaprodi', $user)->first();
        $filettd = public_path('storage/app/public/file_ttd/' . $prodikaprodi->file_ttd);
        if ($ceksurat1 == 's-pol') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpengajuanobservasilapangan', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('oblapangan-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pd') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpermintaandata',  compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Permintaan Data' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-kkl') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratkkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat KKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-trans') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.surattranskripnilai', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Transkrip-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkm') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkm', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat PKM-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pen') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpenelitian', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Penelitian-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-skrip') {
            $jabatanpimpinan = pimpinan::where('jabatan_pimpinan', 'Wakil Dekan Bidang Akademik FMIPA')->first();
            $pdf = Pdf::loadView('user.pdf.suratskripsi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Nota Dinas Skripsi-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-km') { #
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratketeranganmahasiswa', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Ket mhs-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-pkl') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-1')->first();
            $pdf = Pdf::loadView('user.pdf.suratpkl', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            $pdf->set_option('isRemoteEnabled', true);
            return $pdf->stream('Surat PKL-' . Carbon::now()->timestamp . '.pdf');
        } elseif ($ceksurat1 == 's-rekom') {
            $jabatanpimpinan = pimpinan::where('slug_jabatan', 'WD-3')->first();
            $pdf = Pdf::loadView('user.pdf.suratrekomendasi', compact('cekdata', 'cekprodi',  'jabatanpimpinan', 'prodikaprodi', 'filettd'));
            return $pdf->stream('Surat Rekomendasi-' . Carbon::now()->timestamp . '.pdf');
        }
    }


    public function pengajuan_surat()
    {
        $authenticatedUser = Auth::guard('users')->user();

        if (!$authenticatedUser) {
            return redirect()->route('user_login')->with('error', 'Anda tidak bisa mengakses halaman ini.');
        }

        $user = $authenticatedUser->id;

        $pengajuan = Pengajuansurat::where('id_user', $user)->count();

        $pengajuans = Pengajuansurat::where('id_user', $user)->where(function ($query) {
            $query->where('status', 'Ditolak')->orWhere('status', 'Diproses')->orWhere('status', 'Menunggu');
        })->get();

        $ajuantugas = Pengajuansurattugas::where('id_user', $user)->count();

        $pengajuansurattugas = Pengajuansurattugas::where('id_user', $user)->where(function ($query) {
            $query->where('status', 'Ditolak')->orWhere('status', 'Diproses')->orWhere('status', 'Menunggu');
        })->get();

        return view('user.pengajuansurat', compact('pengajuan', 'pengajuans', 'ajuantugas', 'pengajuansurattugas'));
    }






    /**
     * FUNGSI PENGAJUAN SURAT DARI SISI MAHASISWA
     */
    public function ajukan(Request $request)
    {
        $validated = $request->validate([
            'id_surat' => 'required',
            'id_user' => 'required',
            'nama_surat' => 'required',
            'nomor_urut' => '',
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
            'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg|max:2048',
            'nama_file_ajuan' => '',
            'file_acc' => '',
            'nama_file_cc' => '',
            'status' => ''
        ]);

        if ($request->hasFile('file_ajuan')) {
            $fileacc = $request->file('file_ajuan');

            if (!$fileacc->isValid()) {
                return redirect('pengajuansurat')->with('error', 'File yang diupload tidak sesuai dengan format.');
            }

            $filename = uniqid() . '.' . $fileacc->getClientOriginalExtension();
            $fileacc->storeAs('public/file_ajuan', $filename);
            $validated['file_ajuan'] = $filename;
        }

        Pengajuansurat::create($validated);

        return redirect('pengajuansurat')->with('success', 'Berhasil melakukan pengajuan surat, silahkan melihat preview surat untuk memastikan data yang anda input benar');
    }



    /**
     * FUNGSI PENGAJUAN SURAT DARI SISI MAHASISWA
     */
    public function ajukansurattugas(Request $request)
    {
        $validated = $request->validate([
            'id_surat' => 'required',
            'id_user' => 'required',
            'nama_surat' => 'required',
            'nomor_urut' => '',
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
            'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg|max:2048',
            'nama_file_ajuan' => '',
            'file_acc' => '',
            'nama_file_cc' => '',
            'status' => ''
        ]);

        if ($request->hasFile('file_ajuan')) {
            $fileacc = $request->file('file_ajuan');

            if (!$fileacc->isValid()) {
                return redirect('pengajuansurat')->with('error', 'File yang diupload tidak sesuai dengan format.');
            }

            $filename = uniqid() . '.' . $fileacc->getClientOriginalExtension();
            $fileacc->storeAs('public/file_ajuan', $filename);
            $validated['file_ajuan'] = $filename;
        }

        Pengajuansurattugas::create($validated);

        return redirect('pengajuansurat')->with('success', 'Berhasil melakukan pengajuan surat, silahkan melihat preview surat untuk memastikan data yang anda input benar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_pengajuan(Request $request, string $id)
    {
        $request->validate([
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
            'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar|max:2048', 
            'nama_file_ajuan' => '',
            'file_acc' => '',
            'nama_file_cc' => '',
        ]);

        $pengajuansurat = Pengajuansurat::find($id);

        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        if ($request->hasFile('file_ajuan')) {
            $file_ajuan = $request->file('file_ajuan');
            if (!$file_ajuan->isValid()) {
                return back()->with('error', 'File yang diupload tidak sesuai dengan format.');
            }
            Storage::delete('public/file_ajuan/' . $pengajuansurat->file_ajuan);
            $filename = uniqid() . '.' . $file_ajuan->getClientOriginalExtension();
            $file_ajuan->storeAs('public/file_ajuan', $filename);

            $pengajuansurat->update([
                'file_ajuan' => $filename,
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
            ]);
        } else {
            $pengajuansurat->update($request->except('file_ajuan'));
        }

        return back()->with('success', 'Berhasil melakukan update data surat, silahkan melihat preview surat untuk memastikan data yang anda input benar');
    }


    public function update_pengajuantugas(Request $request, string $id)
    {
        $request->validate([
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
            'file_ajuan' => 'file|mimes:pdf,doc,docx,xls,xlsx,csv,rtf,png,jpeg,jpg,zip,rar|max:2048', 
            'nama_file_ajuan' => '',
            'file_acc' => '',
            'nama_file_cc' => '',
        ]);

        $pengajuansurat = Pengajuansurattugas::find($id);

        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        if ($request->hasFile('file_ajuan')) {
            $file_ajuan = $request->file('file_ajuan');
            if (!$file_ajuan->isValid()) {
                return back()->with('error', 'File yang diupload tidak sesuai dengan format.');
            }
            Storage::delete('public/file_ajuan/' . $pengajuansurat->file_ajuan);
            $filename = uniqid() . '.' . $file_ajuan->getClientOriginalExtension();
            $file_ajuan->storeAs('public/file_ajuan', $filename);

            $pengajuansurat->update([
                'file_ajuan' => $filename,
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
            ]);
        } else {
            $pengajuansurat->update($request->except('file_ajuan'));
        }

        return back()->with('success', 'Berhasil melakukan update data surat, silahkan melihat preview surat untuk memastikan data yang anda input benar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_pengajuan(string $id)
    {
        $pengajuansurat = Pengajuansurat::find($id);
        if (!$pengajuansurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $filePath = 'public/file_ajuan/' . $pengajuansurat->file_ajuan;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }

        $pengajuansurat->delete();

        return back()->with('success', 'Berhasil melakukan delete data pengajuan surat');
    }

    public function delete_pengajuantugas(string $id)
    {
        $pengajuansurattugas = Pengajuansurattugas::find($id);
        if (!$pengajuansurattugas) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $filePath = 'public/file_ajuan/' . $pengajuansurattugas->file_ajuan;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response()->json(['message' => 'File tidak ditemukan.'], 404);
        }
        $pengajuansurattugas->delete();

        return back()->with('success', 'Berhasil melakukan delete data pengajuan surat');
    }
}
