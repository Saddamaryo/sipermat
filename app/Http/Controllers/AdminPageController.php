<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    function dataarsip(){
        return view("admin/pengarsipan");
    }

    function datapengajuan(){
        return view('admin/pengajuan');
    }

    function datapimpinan(){
        return view('admin/pimpinan');
    }

    function datamahasiswa(){
        
    }

    function dashboard(){
        
    }

    function dataadmin(){
        
    }
}
