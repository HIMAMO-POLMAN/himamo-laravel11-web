<?php

namespace App\Http\Controllers\Pustaka;

use App\Http\Controllers\Controller;
use App\Models\Pustaka;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PustakaController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('cari');

        $pustakas = Pustaka::orderBy('id', 'desc');

        if ($search) {
            $pustakas->where('title', 'like', "%{$search}%")
                     ->orWhere('collection', 'like', "%{$search}%");
        }

        $pustakas = $pustakas->paginate(10);
        return view('admin.pustaka.index', compact('pustakas'));
    }

    public function create() 
    {
        return view('admin.pustaka.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'url' => 'required|url|regex:/^https:\/\/drive\.google\.com/',
            'collection' => 'required|in:TRO,TRMO,TRIN,Teori',
            'penulis' => 'nullable',
            'penerbit' => 'nullable',
            'tahun_terbit' => 'nullable',
            'isbn' => 'nullable',
            'cover' => 'nullable',
            'abstrak' => 'required',
            'bahasa' => 'required',
            'jumlah_halaman' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul wajib diisi!',
            'url.required' => 'URL wajib diisi!',
            'url.url' => 'URL tidak valid!',
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
            Pustaka::create([
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

            return redirect(route('pustaka.index'))->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('pustaka.index')->with('error', 'Gagal menambahkan data! Silakan coba lagi.');
        }
    }

    public function edit(Pustaka $pustaka)
    {
        return view('admin.pustaka.create', compact('pustaka'));
    }

    public function update(Request $request, Pustaka $pustaka)
    {
        $rules = [
            'title' => 'required',
            'url' => 'required|url|regex:/^https:\/\/drive\.google\.com/',
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
            $pustaka->update([
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

            return redirect(route('pustaka.index'))->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('pustaka.index')->with('error', 'Gagal mengubah data! Silakan coba lagi.');
        }
    }

    public function destroy(Pustaka $pustaka)
    {
        try {
            $pustaka->delete();
            return redirect(route('pustaka.index'))->with('success', 'Pustaka berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('pustaka.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }
}
