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
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class InformationController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');
        $kategori = $request->input('kategori');
        $ae_information = Information::with('category')->withCount('views');
        if ($kategori) {
            $ae_information->where('category_id', $kategori);
        }
        if ($sort === 'terbaru') {
            $ae_information->orderByDesc('id');
        } elseif ($sort === 'terlama') {
            $ae_information->orderBy('id');
        } elseif ($sort === 'terpopuler') {
            $ae_information->orderByDesc('views_count');
        }
        if ($search) {
            $ae_information->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%");
            });
        }
        $ae_informations = $ae_information->paginate(10);
        $kategori_informasi = InformationCategories::all();
        return view('admin.dashboard.ae-information.index', compact('ae_informations', 'kategori_informasi'));
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
            'informasi' => $ae_information->load('category', 'user'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:information_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'desc' => 'required|min:20',
        ], [
            'title.required' => 'Judul wajib diisi',
            'category_id.required' => 'Pilih kategori informasi',
            'image.required' => 'Gambar utama wajib diupload',
            'desc.required' => 'Konten informasi wajib diisi',
        ]);

        try {
            $ext = $request->file('image')->getClientOriginalExtension();
            $mainImageFilename = 'info_' . Str::random(16) . '.' . $ext;
            $mainImagePath = $request->file('image')->storeAs('informasi', $mainImageFilename, 'public');

            $descInput = mb_convert_encoding($request->desc, 'HTML-ENTITIES', 'UTF-8');
            $dom = new \DOMDocument('1.0', 'UTF-8');
            libxml_use_internal_errors(true);
            $dom->loadHTML($descInput, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $contentImagePath = 'content-images/' . date('Y/m');
            Storage::disk('public')->makeDirectory($contentImagePath);
            $filePaths = [];

            foreach ($dom->getElementsByTagName('img') as $img) {
                $src = $img->getAttribute('src');

                if (preg_match('/data:image\/(?<mime>.*?);base64,(?<data>.*)/', $src, $matches)) {
                    $extension = $this->mimeToExtension($matches['mime']);
                    $filename = 'img_' . Str::random(12) . '_' . time() . '.' . $extension;
                    $filePath = "$contentImagePath/$filename";

                    Storage::disk('public')->put($filePath, base64_decode($matches['data']));

                    $img->setAttribute('src', Storage::url($filePath));
                    $img->setAttribute('class', 'img-fluid');
                    $img->removeAttribute('style');

                    $filePaths[] = $filePath;
                }
            }

            $processedHTML = $dom->saveHTML();

            // Pusing bang
            $cleanedHTML = Purifier::clean($processedHTML, [
                'HTML.Allowed' => 'u,i,span[style],b,h1[style],h2[style],h3[style],h4[style],p[style],br,ul,ol,li,strong,em,a[href|title|rel|target|style],img[src|alt|class|style],table[class|style],thead,tbody,tr,th,td',
                'CSS.AllowedProperties' => ['font-size'],
                'AutoFormat.RemoveEmpty' => true,
                'URI.AllowedSchemes' => [
                    'http' => true,
                    'https' => true,
                ],
            ]);

            $information = Information::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'slug' => $this->generateUniqueSlug($request->title),

                'excerpt' => Str::limit(strip_tags($cleanedHTML), 160),
                'image' => $mainImagePath,
                'category_id' => $request->category_id,
                'desc' => $cleanedHTML,
            ]);


            dispatch(function () use ($information, $filePaths) {
                try {
                    Image::make(storage_path('app/public/' . $information->image))
                        ->resize(1200, null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->save();

                    foreach ($filePaths as $path) {
                        Image::make(storage_path('app/public/' . $path))
                            ->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })
                            ->save();
                    }
                } catch (\Exception $e) {
                    Log::error('Image optimization failed: ' . $e->getMessage());
                }
            })->afterResponse();

            return redirect()
                ->route('ae-information.index')
                ->with('success', 'Informasi berhasil dipublikasikan');
        } catch (\Exception $e) {

            isset($mainImagePath) && Storage::disk('public')->delete($mainImagePath);
            if (!empty($filePaths)) {
                foreach ($filePaths as $path) {
                    Storage::disk('public')->delete($path);
                }
            }

            return back()
                ->withInput()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }


    private function mimeToExtension(string $mime): string
    {
        $mimeMap = [
            'jpeg' => 'jpg',
            'png' => 'png',
            'webp' => 'webp',
            'gif' => 'gif',
        ];

        return $mimeMap[strtolower($mime)] ?? 'png';
    }

    private function generateUniqueSlug(string $title, int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Information::where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
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
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:information_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'desc' => 'required|min:20',
        ]);

        try {
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($ae_information->image)) {
                    Storage::disk('public')->delete($ae_information->image);
                }

                $ext = $request->file('image')->getClientOriginalExtension();
                $mainImageFilename = 'info_' . Str::random(16) . '.' . $ext;
                $mainImagePath = $request->file('image')->storeAs('informasi', $mainImageFilename, 'public');

                $ae_information->image = $mainImagePath;
            }

            $descInput = mb_convert_encoding($request->desc, 'HTML-ENTITIES', 'UTF-8');
            $dom = new \DOMDocument('1.0', 'UTF-8');
            libxml_use_internal_errors(true);
            $dom->loadHTML($descInput, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $contentImagePath = 'content-images/' . date('Y/m');
            Storage::disk('public')->makeDirectory($contentImagePath);
            $filePaths = [];

            foreach ($dom->getElementsByTagName('img') as $img) {
                $src = $img->getAttribute('src');

                if (preg_match('/data:image\/(?<mime>.*?);base64,(?<data>.*)/', $src, $matches)) {
                    $extension = $this->mimeToExtension($matches['mime']);
                    $filename = 'img_' . Str::random(12) . '_' . time() . '.' . $extension;
                    $filePath = "$contentImagePath/$filename";

                    Storage::disk('public')->put($filePath, base64_decode($matches['data']));

                    $img->setAttribute('src', Storage::url($filePath));
                    $img->setAttribute('class', 'img-fluid');
                    $img->removeAttribute('style');

                    $filePaths[] = $filePath;
                }
            }

            $processedHTML = $dom->saveHTML();

            $cleanedHTML = Purifier::clean($processedHTML, [
                'HTML.Allowed' => 'u,i,span[style],b,h1[style],h2[style],h3[style],h4[style],p[style],br,ul,ol,li,strong,em,a[href|title|rel|target|style],img[src|alt|class|style],table[class|style],thead,tbody,tr,th,td',
                'CSS.AllowedProperties' => ['font-size'],
                'AutoFormat.RemoveEmpty' => true,
                'URI.AllowedSchemes' => [
                    'http' => true,
                    'https' => true,
                ],
            ]);

            $ae_information->title = $request->title;
            $ae_information->slug = $this->generateUniqueSlug($request->title);
            $ae_information->excerpt = Str::limit(strip_tags($cleanedHTML), 160);
            $ae_information->desc = $cleanedHTML;
            $ae_information->category_id = $request->category_id;
            $ae_information->save();

            dispatch(function () use ($ae_information, $filePaths) {
                try {
                    if (Storage::disk('public')->exists($ae_information->image)) {
                        Image::make(storage_path('app/public/' . $ae_information->image))
                            ->resize(1200, null, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })
                            ->save();
                    }

                    foreach ($filePaths as $path) {
                        Image::make(storage_path('app/public/' . $path))
                            ->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })
                            ->save();
                    }
                } catch (\Exception $e) {
                    Log::error('Image optimization failed during update: ' . $e->getMessage());
                }
            })->afterResponse();

            return redirect()->route('ae-information.index')->with('success', 'Informasi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Information $ae_information)
    {
        try {
            if (Storage::disk('public')->exists($ae_information->image)) {
                Storage::disk('public')->delete($ae_information->image);
            }

            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($ae_information->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            foreach ($dom->getElementsByTagName('img') as $img) {
                $src = $img->getAttribute('src');
                $path = str_replace('/storage/', '', parse_url($src, PHP_URL_PATH));
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }

            $ae_information->delete();

            return redirect()->route('ae-information.index')->with('success', 'Informasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('ae-information.index')->with('error', 'Gagal menghapus data! Silakan coba lagi.');
        }
    }
}
