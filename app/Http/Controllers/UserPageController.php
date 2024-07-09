<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function profilUser()
    {
        return view ('user/profiluser');
    }

    public function pengajuanSurat()
    {
        return view ('user/pengajuansurat');
    }

    public function riwayatPengajuan()
    {
        return view ('user/riwayatpengajuan');
    }

    public function aboutUser()
    {
        return view ('user/about');
    }


}
