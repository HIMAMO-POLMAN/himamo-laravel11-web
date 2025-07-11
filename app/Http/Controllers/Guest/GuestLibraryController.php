<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Libraries;
use App\Models\LibrariesView;
use App\Models\LibraryCollection;
use Illuminate\Http\Request;

class GuestLibraryController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:100',
            'collection_id' => 'nullable|integer|exists:library_collections,id',
            'sort' => 'nullable|in:terbaru,terlama,trending'
        ]);

        $search = $request->input('search');
        $collectionId = $request->input('collection_id');
        $sort = $request->input('sort', 'terbaru');
        $query = Libraries::with(['collection:id,name'])
->select('id', 'title', 'cover', 'collection_id', 'created_at', 'slug')

            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            })
            ->when($collectionId, function ($q) use ($collectionId) {
                $q->where('collection_id', (int)$collectionId);
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

        return view('guest.library.index', [
            "library" => $query->paginate(8),
            'collection_id' => LibraryCollection::with('libraries')->get(),

            'populer' => Libraries::withCount('views')
                ->orderBy('views_count', 'desc')
                ->limit(5)
                ->get(),
            'search' => $search,
            'collectionId' => $collectionId,
            'currentSort' => $sort,
        ]);
    }

    public function show(Libraries $libraries)
    {
        LibrariesView::updateOrCreate([
            'libraries_id' => $libraries->id,
            'ip_address' => request()->ip(),
        ]);


        return view('guest.library.detail', [
            'library' => $libraries->load('collection')->loadCount('views'),
        ]);
    }
}
