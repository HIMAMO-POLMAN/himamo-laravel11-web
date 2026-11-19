<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    // Menampilkan seluruh kegiatan
    public function index(Request $request)
    {
        $query = Kegiatan::query();

        // Pencarian berdasarkan judul dan lokasi
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kategori divisi
        if ($request->filled('kategori') && $request->kategori !== 'semua') {
            $query->where('kategori', $request->kategori);
        }

        // Pengurutan tanggal
        $sort = $request->input('sort', 'terbaru');

        if ($sort === 'terlama') {
            $query->orderBy('tanggal_mulai', 'asc');
        } else {
            $query->orderBy('tanggal_mulai', 'desc');
        }

        $kegiatans = $query->paginate(10)->withQueryString();

        return view(
            'admin.dashboard.ae-kegiatan.index',
            compact('kegiatans')
        );
    }

    // Form tambah kegiatan
    public function create()
    {
        return view('admin.dashboard.ae-kegiatan.create');
    }

    // Menyimpan kegiatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:150',
        ]);

        Kegiatan::create($validated);

        return redirect()
            ->route('ae-kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    // Form edit kegiatan
    public function edit(Kegiatan $ae_kegiatan)
    {
        return view('admin.dashboard.ae-kegiatan.edit', [
            'kegiatan' => $ae_kegiatan
        ]);
    }

    // Memperbarui kegiatan
    public function update(Request $request, Kegiatan $ae_kegiatan)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'kategori' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:150',
        ]);

        $ae_kegiatan->update($validated);

        return redirect()
            ->route('ae-kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    // Menghapus kegiatan
    public function destroy(Kegiatan $ae_kegiatan)
    {
        $ae_kegiatan->delete();

        return redirect()
            ->route('ae-kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }

    // Mengelompokkan kegiatan berdasarkan status tanggal
    public function kategori()
    {
        $hariIni = now()->toDateString();

        $semuaKegiatan = Kegiatan::orderBy('tanggal_mulai', 'asc')->get();

        $belumDimulai = $semuaKegiatan->filter(function ($item) use ($hariIni) {
            return $item->tanggal_mulai->toDateString() > $hariIni;
        });

        $sedangBerlangsung = $semuaKegiatan->filter(function ($item) use ($hariIni) {
            $mulai = $item->tanggal_mulai->toDateString();

            $selesai = $item->tanggal_selesai
                ? $item->tanggal_selesai->toDateString()
                : $mulai;

            return $hariIni >= $mulai && $hariIni <= $selesai;
        });

        $sudahSelesai = $semuaKegiatan->filter(function ($item) use ($hariIni) {
            $selesai = $item->tanggal_selesai
                ? $item->tanggal_selesai->toDateString()
                : $item->tanggal_mulai->toDateString();

            return $selesai < $hariIni;
        });

        return view(
            'admin.dashboard.ae-kegiatan.kategori',
            compact(
                'belumDimulai',
                'sedangBerlangsung',
                'sudahSelesai'
            )
        );
    }
}
