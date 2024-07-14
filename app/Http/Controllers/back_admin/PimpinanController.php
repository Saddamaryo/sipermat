<?php

namespace App\Http\Controllers\back_admin;

use App\Http\Controllers\Controller;
use App\Models\pimpinan;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pimpinan', [
            'pimpinan' => pimpinan::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pimpinan = $request->validate(
            ['nama_pimpinan' => 'required',
            'nip_pimpinan' => 'required',
            'jabatan_pimpinan' => 'required',
            'slug_jabatan' => 'required',
            'prodi_pimpinan' => ''
        ]
        );
        pimpinan::create($pimpinan);
        return back()->with('success', 'Berhasil menambah data pimpinan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pimpinan = $request->validate(
            ['nama_pimpinan' => 'required',
            'nip_pimpinan' => 'required',
            'jabatan_pimpinan' => 'required',
            'prodi_pimpinan' => ''
        ]
        );
        pimpinan::find($id)->update($pimpinan);
        return back()->with('success', 'Berhasil melakukan update data pimpinan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pimpinan::find($id)->delete();
        return back()->with('success', 'Berhasil delete data pimpinan');
    }
}
