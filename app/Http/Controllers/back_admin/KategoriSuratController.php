<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Models\Kategorisurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kategorisurat', [
            'kategorisurat' => Kategorisurat::get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategorisurat = $request->validate(
            [
                'nama_surat' => 'required',
                'nomor' => 'required',
                'deskripsi_surat' => 'required',
                'slug' => 'required',
                'template_surat' => 'required|file|mimes:pdf'
            ]
        );

        $templatesurat = $request->file('template_surat');
        $filename = uniqid() . '.' . $templatesurat->getClientOriginalExtension();
        $templatesurat->storeAs('public/template_surat', $filename);
        $kategorisurat['template_surat'] = $filename;
        Kategorisurat::create($kategorisurat);
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'nama_surat' => 'required',
                'nomor' => 'required',
                'deskripsi_surat' => 'required',
                'template_surat' => 'file|mimes:pdf'
            ]
        );

        $kategorisurat = Kategorisurat::find($id);
        if (!$kategorisurat) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $kategorisurat->nama_surat = $request->nama_surat;
        $kategorisurat->nomor = $request->nomor;
        $kategorisurat->deskripsi_surat = $request->deskripsi_surat;

        if ($request->hasFile('template_surat')) {
            if ($kategorisurat->template_surat) {
                Storage::delete('public/template_surat/' . $kategorisurat->template_surat);
            }

            $file = $request->file('template_surat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/template_surat', $filename);
            $kategorisurat->template_surat = $filename;
        }

        $kategorisurat->save();

        return back()->with('success', 'Berhasil melakukan update data surat');
    }


    public function downloadfile_template($id)
    {
        $item = Kategorisurat::find($id);

        if (!$item) {
            return back()->with('error', 'Surat tidak ditemukan.');
        }

        $filePath = "public/template_surat/{$item->template_surat}";

        if (Storage::exists($filePath)) {
            return Storage::download($filePath, $item->template_surat);
        } else {
            return back()->with('error', 'File tidak ditemukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy(string $id)
    {
        Kategorisurat::find($id)->delete();
        return back();
    }*/
}
