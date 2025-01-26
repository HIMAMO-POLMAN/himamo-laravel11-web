<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Libraries;
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
        $search = $request->input('search');

        $pustakas = Libraries::orderBy('id', 'desc');

        if ($search) {
            $pustakas->where('title', 'like', "%{$search}%")
                     ->orWhere('collection', 'like', "%{$search}%");
        }

        $pustakas = $pustakas->paginate(10);
        return view('admin.dashboard.ae-library.index', compact('pustakas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.ae-library.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'url' => 'required|url|regex:/^https:\/\/drive\.google\.com\/.*\/view$/',
            'collection' => 'required|in:TRO,TRMO,TRIN,Teori',
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
                'collection' => $request->collection
            ]);

            return redirect(route('ae-pustaka.index'))->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('ae-pustaka.index')->with('error', 'Gagal menambahkan data! Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Libraries $libraries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libraries $libraries)
    {
        $pustaka = $libraries;
        return view('admin.dashboard.ae-library.edit',compact('pustaka'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libraries $libraries)
    {
        $rules = [
            'title' => 'required',
            'url' => 'required|url|regex:/^https:\/\/drive\.google\.com\/.*\/view$/',
            'collection' => 'required|in:TRO,TRMO,TRIN,Teori',
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
            $libraries->update([
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
                'collection' => $request->collection
            ]);
            return redirect(route('ae-pustaka.index'))->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('ae-pustaka.index')->with('error', 'Gagal mengubah data! Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libraries $libraries)
    {
        try {
            $libraries->delete();
            return redirect(route('ae-pustaka.index'))->with('success', 'Pustaka berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('ae-pustaka.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }
}
