<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LibraryCollection;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LibraryCollectionController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');
        $collections = LibraryCollection::orderBy('id', 'desc');


        if ($sort === 'terbaru') {
            $collections->orderByDesc('id');
        } elseif ($sort === 'terlama') {
            $collections->orderBy('id');
        }


        if ($search) {
            $collections->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            });
        }

        $collections = $collections->paginate(10);
        return view('admin.dashboard.ae-library.collection.index', compact('collections'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama Koleksi wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            LibraryCollection::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
            ]);

            return redirect(route('library-collection.index'))->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('library-collection.index')->with('error', 'Gagal menambahkan data! Silakan coba lagi.');
        }
    }

    public function show(LibraryCollection $library_collection)
    {
        //
    }

    public function edit(LibraryCollection $library_collection)
    {
        $koleksi = $library_collection;
        return view('admin.dashboard.ae-library.collection.edit', compact('koleksi'));
    }

    public function update(Request $request, LibraryCollection $library_collection)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama koleksi wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $library_collection->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
            ]);
            return redirect(route('library-collection.index'))->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->route('library-collection.index')->with('error', 'Gagal mengubah data! Silakan coba lagi.');
        }
    }

    public function destroy(LibraryCollection $library_collection)
    {
        try {
            $library_collection->delete();
            return redirect(route('library-collection.index'))->with('success', 'Koleksi pustaka berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('library-collection.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }
}
