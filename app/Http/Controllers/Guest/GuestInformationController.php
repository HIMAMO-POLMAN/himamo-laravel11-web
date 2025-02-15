<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\InformationCategories;
use App\Models\InformationView;
use Illuminate\Http\Request;

class GuestInformationController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $kategoriId = $request->input('kategori');
        $query = Information::with(['kategori_informasi', 'user'])
            ->when($search, function ($q) use ($search) {
                return $q->where('title', 'like', '%' . $search . '%');
            })
            ->when($kategoriId, function ($q) use ($kategoriId) {
                return $q->where('kategori_informasi_id', $kategoriId);
            })
            ->orderBy('updated_at', 'asc');

        return view('guest.information.index', [
            "informasi" => $query->paginate(12),
            'kategori_informasi' => InformationCategories::with('informasi')->get(),
            'populer' => Information::withCount('views')
                ->orderBy('views_count', 'desc')
                ->limit(5)
                ->get(),
            'search' => $search,
            'kategoriId' => $kategoriId,
        ]);
    }
    public function show(Information $informasi)
    {
        InformationView::updateOrCreate([
            'information_id' => $informasi->id,
            'ip_address' => request()->ip(),
        ]);


        return view('guest.information.detail', [
            'informasi' => $informasi->load('kategori_informasi','user')
                ->loadCount('views'),
            'kategori_informasi' => InformationCategories::with(['informasi'])->get(),
        ]);
    }
}
