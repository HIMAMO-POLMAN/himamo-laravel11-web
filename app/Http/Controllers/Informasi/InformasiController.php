<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Informasi;
use App\Models\Kategori_informasi;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('cari');

        $informasi = Informasi::with('kategori_informasi')->orderBy('title', 'asc');

        if ($request->get('sort') == 'terbaru' || !$request->has('sort')) {
            $informasi->orderByDesc('id');
        } else {
            $informasi->orderByRaw('LENGTH(title) ASC')->orderBy('title');
        }
        if ($search) {
            $informasi->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        $informasis = $informasi->paginate(10);

        return view('admin.informasi.index', compact('informasis'));
    }


    public function create()
    {
        return view('admin.informasi.create', [
            'kategori_informasi' => Kategori_informasi::all()
        ]);
    }

    public function show(Informasi $informasi)
    {
        return view('admin.informasi.detail', [
            'informasi' => $informasi->load('kategori_informasi', 'user'),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'kategori_informasi_id' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
            'desc' => 'required|min:20',
        ];

        $messages = [
            'title.required' => 'Title wajib diisi!',
            'image.required' => 'Image wajib diisi!',
            'kategori_informasi_id.required' => 'Kategori informasi wajib diisi!',
            'desc.required' => 'Description wajib diisi!',
            'desc.min' => 'Description minimal 20 karakter!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Image
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/informasi', $fileName);

            // Artikel
            $storage = "storage/content-informasi";
            $dom = new \DOMDocument();

            libxml_use_internal_errors(true);
            $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            libxml_clear_errors();

            $images = $dom->getElementsByTagName('img');

            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?);/', $src, $groups);
                    $mimetype = $groups['mime'] ?? null;
                    if ($mimetype) {
                        $fileNameContent = uniqid();
                        $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                        $filePath = ("$storage/$fileNameContentRand.$mimetype");
                        $image = Image::make($src)->resize(1440, 720)->encode($mimetype, 100)->save(public_path($filePath));
                        $new_src = asset($filePath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                        $img->setAttribute('class', 'img-responsive');
                    }
                }
            }

            Informasi::create([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                "excerpt" => Str::limit(strip_tags($request->desc), 100),
                'image' => $fileName,
                'kategori_informasi_id' => $request->kategori_informasi_id,
                'desc' => $dom->saveHTML(),
            ]);

            return redirect(route('informasi.index'))->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('informasi.index')->with('error', 'Gagal menambahkan data! Silakan coba lagi.');
        }
    }

    public function destroy(Informasi $informasi)
    {
        try {
            // Hapus file gambar dari storage
            if (Storage::exists('public/informasi/' . $informasi->image)) {
                Storage::delete('public/informasi/' . $informasi->image);
            }

            // Hapus data informasi dari database
            $informasi->delete();

            return redirect(route('informasi.index'))->with('success', 'Informasi berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('informasi.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }

    public function edit(Informasi $informasi)
    {
        $kategori_informasi = Kategori_informasi::all();
        return view('admin.informasi.edit', [
            'informasi' => $informasi,
            'kategori_informasi' => $kategori_informasi
        ]);
    }

    public function update(Request $request, Informasi $informasi)
    {
        $rules = [
            'title' => 'required',
            'kategori_informasi_id' => 'required',
            'image' => 'nullable|max:1000|mimes:jpg,jpeg,png,webp',
            'desc' => 'required|min:20',
        ];

        $messages = [
            'title.required' => 'Title wajib diisi!',
            'kategori_informasi_id.required' => 'Kategori wajib diisi!',
            'image.mimes' => 'Format gambar tidak valid!',
            'desc.required' => 'Description wajib diisi!',
            'desc.min' => 'Description minimal 20 karakter!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->hasFile('image')) {
                if (Storage::exists('public/informasi/' . $informasi->image)) {
                    Storage::delete('public/informasi/' . $informasi->image);
                }

                $fileName = time() . '.' . $request->image->extension();
                $request->file('image')->storeAs('public/informasi', $fileName);
                $informasi->image = $fileName;
            }

            $informasi->title = $request->title;
            $informasi->slug = Str::slug($request->title, '-');
            $informasi->excerpt = Str::limit(strip_tags($request->desc), 100);
            $informasi->desc = $request->desc;
            $informasi->kategori_informasi_id = $request->kategori_informasi_id; // Perbaiki ini
            $informasi->save();

            return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('informasi.edit', $informasi->slug)->with('error', 'Gagal memperbarui data! Silakan coba lagi.');
        }
    }
}
