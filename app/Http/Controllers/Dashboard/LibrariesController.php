<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Libraries;
use App\Models\LibraryCollection;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LibrariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $collections = LibraryCollection::all();
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');
        $koleksi = $request->input('koleksi');
        $pustakas = Libraries::with("collections")->orderBy('id', 'desc');

        if ($koleksi) {
            $pustakas->whereHas('collections', function ($query) use ($koleksi) {
                $query->where('slug', $koleksi);
            });
        }


        if ($sort === 'terbaru') {
            $pustakas->orderByDesc('id');
        } elseif ($sort === 'terlama') {
            $pustakas->orderBy('id');
        }


        if ($search) {
            $pustakas->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('collection', 'like', "%{$search}%");
            });
        }

        $pustakas = $pustakas->paginate(10);
        return view('admin.dashboard.ae-library.index', compact('pustakas','collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collections = LibraryCollection::all();
        return view('admin.dashboard.ae-library.create',compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'url' => 'required|url|regex:/^https:\/\/drive\.google\.com\/.*\/view$/',
            'collection' => 'required',
            'penulis' => 'nullable',
            'penerbit' => 'nullable',
            'tahun_terbit' => 'nullable',
            'isbn' => 'nullable',
            'cover' => 'nullable|url',
            'abstrak' => 'required',
            'bahasa' => 'required',
            'jumlah_halaman' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul wajib diisi!',
            'url.required' => 'URL wajib diisi!',
            'url.url' => 'URL tidak valid!',
            'url.regex' => 'Format URL tidak valid!',
            'cover.url' => 'URL Cover tidak valid!',
            'collection.required' => 'Koleksi wajib diisi!',
            'collection.in' => 'Data yang dipilih tidak valid!',
            'abstrak.required' => 'Abstrak wajib diisi!',
            'bahasa.required' => 'Bahasa wajib diisi!',
            'jumlah_halaman.required' => 'Jumlah Halaman wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $collectionId = LibraryCollection::where("slug",$request->collection)->first()->id;
            Libraries::create([
                'title' => $request->title,
                'url' => $request->url,
                'penulis' => $request->penulis ?? NULL,
                'penerbit' => $request->penerbit ?? NULL,
                'tahun_terbit' => $request->tahun_terbit ?? NULL,
                'isbn' => $request->isbn ?? NULL,
                'cover' => $request->cover ?? NULL,
                'bahasa' => $request->bahasa,
                'abstrak' => $request->abstrak,
                'jumlah_halaman' => $request->jumlah_halaman,
                'slug' => Str::slug($request->title, '-'),
                'collection' => $collectionId
            ]);

            return redirect(route('ae-library.index'))->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('ae-library.index')->with('error', 'Gagal menambahkan data! Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Libraries $ae_library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libraries $ae_library)
    {
        $pustaka = $ae_library;
        $collections = LibraryCollection::all();
        return view('admin.dashboard.ae-library.edit', compact('pustaka','collections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libraries $ae_library)
    {
        $rules = [
            'title' => 'required',
            'url' => 'required|url|regex:/^https:\/\/drive\.google\.com\/.*\/view$/',
            'collection' => 'required',
            'penulis' => 'nullable',
            'penerbit' => 'nullable',
            'tahun_terbit' => 'nullable',
            'isbn' => 'nullable',
            'cover' => 'nullable|url',
            'abstrak' => 'required',
            'bahasa' => 'required',
            'jumlah_halaman' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul wajib diisi!',
            'url.required' => 'URL wajib diisi!',
            'url.url' => 'URL tidak valid!',
            'url.regex' => 'Format URL tidak valid!',
            'cover.url' => 'URL Cover tidak valid!',
            'collection.required' => 'Koleksi wajib diisi!',
            'collection.in' => 'Data yang dipilih tidak valid!',
            'abstrak.required' => 'Abstrak wajib diisi!',
            'bahasa.required' => 'Bahasa wajib diisi!',
            'jumlah_halaman.required' => 'Jumlah Halaman wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $collectionId = LibraryCollection::where("slug",$request->collection)->first()->id;
            $ae_library->update([
                'title' => $request->title,
                'url' => $request->url,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'cover' => $request->cover,
                'bahasa' => $request->bahasa,
                'abstrak' => $request->abstrak,
                'jumlah_halaman' => $request->jumlah_halaman,
                'slug' => Str::slug($request->title, '-'),
                'collection' => $collectionId
            ]);
            return redirect(route('ae-library.index'))->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('ae-library.index')->with('error', 'Gagal mengubah data! Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libraries $ae_library)
    {
        try {
            $ae_library->delete();
            return redirect(route('ae-library.index'))->with('success', 'Pustaka berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('ae-library.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }
}
