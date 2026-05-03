<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Libraries;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $bulanIni = now()->month;
        $tahunIni = now()->year;

        Carbon::setLocale('id');
        $totalInformasi = Information::count();
        $informasiTerbaru = Information::withCount('views')->latest()->take(3)->get();
        $totalPustaka = Libraries::count();
        $pustakaTerbaru = Libraries::withCount('views')->latest()->take(3)->get();
        $totalPengguna = User::count();
        $informasiPopuler = Information::withCount(['views as views_count' => function ($query) use ($bulanIni, $tahunIni) {
            $query->whereMonth('created_at', $bulanIni)
                ->whereYear('created_at', $tahunIni);
        }])
            ->orderByDesc('views_count')
            ->take(3)
            ->get();

        Carbon::setLocale('id');

        $grafikViewsInformasi = Information::withCount(['views as jumlah'])
            ->get()
            ->groupBy(fn($item) => $item->created_at->format('m'))
            ->map(fn($group) => [
                'bulan' => Carbon::create(null, (int) $group->first()->created_at->format('m'), 1)->translatedFormat('F'),
                'jumlah' => (int) $group->sum('jumlah')
            ])
            ->values();

$pustakaPopuler = Libraries::withCount(['views as views_count' => function ($query) use ($bulanIni, $tahunIni) {
    $query->whereMonth('created_at', $bulanIni)
          ->whereYear('created_at', $tahunIni);
}])
->orderByDesc('views_count')
->take(3)
->get();

        $grafikViewsPustaka = Libraries::withCount('views')
            ->get()
            ->groupBy(fn($item) => $item->created_at->format('m'))
            ->map(fn($group) => [
                'bulan' => Carbon::create(null, (int) $group->first()->created_at->format('m'), 1)->translatedFormat('F'),
                'jumlah' => (int) $group->sum('views_count')
            ])
            ->values();

        return view('admin.dashboard.index', compact(
            'totalPengguna',
            'totalInformasi',
            'informasiTerbaru',
            'informasiPopuler',
            'totalPustaka',
            'pustakaTerbaru',
            'pustakaPopuler',
            'grafikViewsInformasi',
            'grafikViewsPustaka'
        ));
    }
}
