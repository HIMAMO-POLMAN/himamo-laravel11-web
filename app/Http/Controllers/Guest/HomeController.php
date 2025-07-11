<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use App\Models\Information;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.index', [
            "informasi" => Information::with(['user'])->orderBy('updated_at', 'asc')->paginate(3),

        ]);
    }

    public function d2mekatronika()
    {
        return view('guest.prodi.prodi-d2-trmo');
    }

    public function d4mekatronika()
    {
        return view('guest.prodi.prodi-d4-trmo');
    }

    public function d4otomasi()
    {
        return view('guest.prodi.prodi-d4-tro');
    }

    public function d4trin()
    {
        return view('guest.prodi.prodi-d4-trin');
    }

}
