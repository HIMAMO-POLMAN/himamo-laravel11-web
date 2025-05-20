<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Libraries;
use App\Models\LibrariesView;
use App\Models\LibraryCollection;
use Illuminate\Http\Request;

class GuestLibrariesController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $kategoriId = $request->input('kategori');
        $sort = $request->input('sort');
        $query = Libraries::with(['collections'])
            ->when($search, function ($q) use ($search) {
                return $q->where('title', 'like', '%' . $search . '%');
            })
            ->when($kategoriId, function ($q) use ($kategoriId) {
                return $q->where('collection', $kategoriId);
            })->when($sort, function ($q) use ($sort) {
                switch($sort){
                    case "Terbit-terbaru":
                        $q->orderBy('tahun_terbit', 'desc');
                        break;
                    case "Terbit-terlama":
                        $q->orderBy('tahun_terbit', 'asc');
                        break;
                    case "Sering-dibaca":
                        $q->withCount('views')->orderBy('views_count', 'desc');
                        break;
                    default:
                        $q->orderBy('updated_at', 'desc');
                }
                return $q;
            });

        
        return view('guest.library.index', [
            "pustakas" => $query->paginate(12),
            'category' => LibraryCollection::with('libraries')->get(),
            // 'populer' => Libraries::withCount('views')
            //     ->orderBy('views_count', 'desc')
            //     ->limit(5)
            //     ->get(),
            'search' => $search,
            'kategoriId' => $kategoriId,
            'sort' => $sort,
        ]);
    }
    public function show(Libraries $libraries)
    {
        LibrariesView::updateOrCreate([
            'libraries_id' => $libraries->id,
            'ip_address' => request()->ip(),
        ]);


        return view('guest.library.detail', [
            'informasi' => $libraries->load('collections')->loadCount('views'),
            // 'categories' => LibraryCollection::with(['libraries'])->get(),
        ]);
    }
}
