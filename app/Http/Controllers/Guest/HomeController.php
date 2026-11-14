<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use App\Models\Information;
use App\Models\Libraries;
use App\Models\Kegiatan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
public function index()
{
    // Mengambil data kegiatan untuk kalender
    $kegiatan = Kegiatan::orderBy('tanggal_mulai', 'asc')->get();

    // Mengambil data informasi
    $informasi = Information::with(['user'])
        ->orderBy('updated_at', 'asc')
        ->paginate(3);

    // Mengambil data perpustakaan
    $perpustakaan = Libraries::with(['user'])
        ->orderBy('updated_at', 'asc')
        ->paginate(3);

    // Mengirim semua data ke halaman utama
    return view('guest.index', compact(
        'kegiatan',
        'informasi',
        'perpustakaan'
    ));
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

}
