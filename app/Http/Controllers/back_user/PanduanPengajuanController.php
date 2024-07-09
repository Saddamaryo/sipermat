<?php

namespace App\Http\Controllers\back_user;

use App\Http\Controllers\Controller;
use App\Models\Kategorisurat;
use Illuminate\Http\Request;

class PanduanPengajuanController extends Controller
{
    public function panduanpenggunaan()
    {
        return view('user.panduanpenggunaan', [
            'kategorisurat' =>Kategorisurat::get()
        ]);
    }
}
