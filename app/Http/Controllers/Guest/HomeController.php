<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

use App\Models\Information;
use App\Models\Leader;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{

      public function index(){
        return view('index',[
            "informasi" => Information::with(['user'])->orderBy('updated_at', 'asc')->paginate(4),
            "leaders" => Leader::active()->orderByDesc('period_start')->get(),
        ]);
    }


    public function d2mekatronika() {
        return view('guest.prodi.prodi-d2-trmo');
    }

    public function d4mekatronika() {
        return view('guest.prodi.prodi-d4-trmo');
    }

    public function d4otomasi() {
        return view('guest.prodi.prodi-d4-tro');
    }

    public function d4trin() {
        return view('guest.prodi.prodi-d4-trin');
    }

    public function show(string $slug)
    {
        $programs = [
            'd4-tro' => [
                'slug' => 'd4-tro',
                'kode' => 'D4 TRO',
                'nama_lengkap' => 'Teknologi Rekayasa Otomasi',
                'deskripsi_singkat' => 'Perancangan, integrasi, dan optimalisasi sistem instrumen serta kontrol otomasi lini produksi pabrik.',
                'visi' => 'Menjadi program studi unggul dalam rekayasa otomasi untuk mendukung manufaktur yang cerdas dan berkelanjutan.',
                'keunggulan' => ['Sistem kontrol industri', 'Instrumentasi dan robotika', 'Integrasi otomasi manufaktur'],
                'image_cover' => 'img-prodi-tro.webp',
                'gelar' => 'Sarjana Terapan Teknik (S.Tr.T.)',
                'link_bahan_ajar' => '#',
            ],
            'd4-trmo' => [
                'slug' => 'd4-trmo',
                'kode' => 'D4 TRMO',
                'nama_lengkap' => 'Teknologi Rekayasa Mekatronika',
                'deskripsi_singkat' => 'Sinergi elektro, mekanik, sistem kontrol terprogram, dan pengembangan robotika industri.',
                'visi' => 'Menjadi program studi unggul dalam rekayasa mekatronika yang adaptif terhadap kebutuhan industri.',
                'keunggulan' => ['Rekayasa mekanik dan elektronika', 'Pemrograman sistem kendali', 'Pengembangan robotika industri'],
                'image_cover' => 'img-prodi-trmo.webp',
                'gelar' => 'Sarjana Terapan Teknik (S.Tr.T.)',
                'link_bahan_ajar' => '#',
            ],
            'd4-trin' => [
                'slug' => 'd4-trin',
                'kode' => 'D4 TRIN',
                'nama_lengkap' => 'Teknologi Rekayasa Informatika Industri',
                'deskripsi_singkat' => 'Arsitektur data eksekusi manufaktur, integrasi sistem ERP, dan AI industri 4.0.',
                'visi' => 'Menjadi program studi unggul dalam informatika industri dan transformasi digital manufaktur.',
                'keunggulan' => ['Sistem informasi industri', 'Data dan kecerdasan buatan', 'Integrasi teknologi manufaktur'],
                'image_cover' => 'img-prodi-trin.webp',
                'gelar' => 'Sarjana Terapan Teknik (S.Tr.T.)',
                'link_bahan_ajar' => '#',
            ],
        ];

        if (! isset($programs[$slug])) {
            throw new NotFoundHttpException();
        }

        return view('guest.prodi.show', [
            'prodi' => $programs[$slug],
            'otherProdi' => array_values(array_filter($programs, fn ($program) => $program['slug'] !== $slug)),
        ]);
    }

    public function about() {
        return view('guest.about.index');
    }
}
