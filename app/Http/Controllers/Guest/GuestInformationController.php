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
        $request->validate([
            'search' => 'nullable|string|max:100',
            'kategori' => 'nullable|integer|exists:information_categories,id',
            'sort' => 'nullable|in:terbaru,terlama,trending'
        ]);

        $search = $request->input('search');
        $kategoriId = $request->input('kategori');
        $sort = $request->input('sort', 'terbaru');
        $query = Information::with(['category:id,name', 'user:id,name'])
            ->select('id', 'title', 'image', 'category_id', 'user_id', 'created_at')
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            })
            ->when($kategoriId, function ($q) use ($kategoriId) {
                $q->where('category_id', (int)$kategoriId);
            });

        switch ($sort) {
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            case 'trending':
                $query->withCount(['views' => function ($q) {
                    $q->where('created_at', '>=', now()->subDays(30));
                }])->orderBy('views_count', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        return view('guest.information.index', [
            "informasi" => $query->paginate(9),
            'category' => InformationCategories::with('information')->get(),
            'populer' => Information::withCount('views')
                ->orderBy('views_count', 'desc')
                ->limit(5)
                ->get(),
            'search' => $search,
            'kategoriId' => $kategoriId,
            'currentSort' => $sort,
        ]);
    }

    public function show(Information $informasi)
    {
        InformationView::updateOrCreate([
            'information_id' => $informasi->id,
            'ip_address' => request()->ip(),
        ]);

        return view('guest.information.detail', [
            'informasi' => $informasi->load('category', 'user')->loadCount('views'),
            'categories' => InformationCategories::with(['information'])->get(),
        ]);
    }
}
