<?php

namespace App\Http\Controllers\back_user;
use App\Http\Controllers\Controller;
use App\Models\Kategorisurat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginUserController extends Controller
{
    public function loginuser(){
        return view('user.loginuser');
    }

    public function login_submit(Request $request) {
            
        $request->validate(
            ['nim_mahasiswa' => 'required',
            'password' =>'required'
            ]
        );
        $credentials = $request->only('nim_mahasiswa', 'password');
        if (Auth::guard('users')->attempt($credentials)){
            $user = User::where('nim_mahasiswa', $request->input('nim_mahasiswa'))->first();
            Auth::guard('users')->login($user);
            return redirect()->route('user_katalog')->with('success', 'Login berhasil');
        }
        else{
            return redirect()->route('user_login')->with('error', 'Login gagal, periksa kembali NIM dan Password yang diisi');
        }
    }

    public function katalogsurat(){
        #return view('user.katalogsurat');
        $kategorisurat = Kategorisurat::all();
        return view('user.katalogsurat', compact('kategorisurat'));
    }


    public function logout(){
        Auth::guard('users')->logout();
        return redirect()->route('user_login')->with('success', 'Logout berhasil');
    }

}
