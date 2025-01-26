<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\InformationCategories;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $ae_information = Information::with('kategori_informasi')->orderBy('title', 'asc');

        if ($request->get('sort') == 'terbaru' || !$request->has('sort')) {
            $ae_information->orderByDesc('id');
        } else {
            $ae_information->orderByRaw('LENGTH(title) ASC')->orderBy('title');
        }
        if ($search) {
            $ae_information->where('title', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%");
        }
        $ae_informations = $ae_information->paginate(10);

        return view('admin.dashboard.ae-information.index', compact('ae_informations'));
    }


    public function create()
    {
        return view('admin.dashboard.ae-information.create', [
            'kategori_informasi' => InformationCategories::all()
        ]);
    }

    public function show(Information $ae_information)
    {
        return view('admin.dashboard.ae-information.show', [
            'informasi' => $ae_information->load('kategori_informasi', 'user'),
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

            Information::create([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                "excerpt" => Str::limit(strip_tags($request->desc), 100),
                'image' => $fileName,
                'kategori_informasi_id' => $request->kategori_informasi_id,
                'desc' => $dom->saveHTML(),
            ]);

            return redirect(route('ae-information.index'))->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->route('ae-information.index')->with('error', 'Gagal menambahkan data! Silakan coba lagi.');
        }
    }

    public function destroy(Information $ae_information)
    {
        try {
            // Hapus file gambar dari storage
            if (Storage::exists('public/informasi/' . $ae_information->image)) {
                Storage::delete('public/informasi/' . $ae_information->image);
            }

            // Hapus data informasi dari database
            $ae_information->delete();

            return redirect(route('ae-information.index'))->with('success', 'Informasi berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('ae-information.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }

    public function edit(Information $ae_information)
    {
        $kategori_informasi = InformationCategories::all();
        return view('admin.dashboard.ae-information.edit', [
            'informasi' => $ae_information,
            'kategori_informasi' => $kategori_informasi
        ]);
    }

    public function update(Request $request, Information $ae_information)
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
                if (Storage::exists('public/informasi/' . $ae_information->image)) {
                    Storage::delete('public/informasi/' . $ae_information->image);
                }

                $fileName = time() . '.' . $request->image->extension();
                $request->file('image')->storeAs('public/informasi', $fileName);
                $ae_information->image = $fileName;
            }

            $ae_information->title = $request->title;
            $ae_information->slug = Str::slug($request->title, '-');
            $ae_information->excerpt = Str::limit(strip_tags($request->desc), 100);
            $ae_information->desc = $request->desc;
            $ae_information->kategori_informasi_id = $request->kategori_informasi_id; // Perbaiki ini
            $ae_information->save();

            return redirect()->route('ae-information.index')->with('success', 'Informasi berhasil diperbarui');
        } catch (Exception $e) {
            return redirect()->route('ae-information.edit', $ae_information->slug)->with('error', 'Gagal memperbarui data! Silakan coba lagi.');
        }
    }
}
