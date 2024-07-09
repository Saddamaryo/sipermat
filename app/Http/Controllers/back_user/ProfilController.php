<?php

namespace App\Http\Controllers\back_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampilprofil()
    {
        $user = Auth::guard('users')->user()->id;
        $tampilprofil = User::where('id', $user)->get();
        return view('user.profiluser', compact('tampilprofil'));
    }

    public function changepassword(Request $request)
    {
        $authenticatedUser = Auth::guard('users')->user();

        if (!$authenticatedUser) {
            return redirect()->route('user_login')->with('error', 'Harus login terlebih dahulu untuk mengakses halaman ini');
        }

        // Validasi input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai',
            'new_password.min' => 'Password baru minimal harus 8 karakter',
        ]);

        if (!Hash::check($request->old_password, $authenticatedUser->password)) {
            return back()->with("error", "Password lama tidak sesuai");
        }

        User::whereId($authenticatedUser->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password telah berhasil diubah!");
    }
}
