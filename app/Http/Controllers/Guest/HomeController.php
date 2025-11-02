<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use App\Models\Information;
use App\Models\Libraries;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.index', [
            "informasi" => Information::with(['user'])->orderBy('updated_at', 'asc')->paginate(3),
"perpustakaan" => Libraries::with(['user'])->orderBy('updated_at', 'asc')->paginate(3),
        ]);
    }


    public function jurusan()
    {
        return view('guest.about.jurusan.index');
    }

       public function kabinet()
    {
        return view('guest.about.kabinet.index');
    }

    public function d4mekatronika()
    {
        return view('guest.about.jurusan.prodi-d4-trmo');
    }

    public function d4otomasi()
    {
        return view('guest.about.jurusan.prodi-d4-tro');
    }

    public function d4trin()
    {
        return view('guest.about.jurusan.prodi-d4-trin');
    }

    public function d4trsa()
    {
        return view('guest.about.jurusan.prodi-d4-trsa');
    }

     public function s2tsiberfisik()
    {
        return view('guest.about.jurusan.prodi-s2t-siber-fisik');
    }

    public function melajuBersama()
    {
        return view('guest.kabinet.melaju-bersama');
    }

}
