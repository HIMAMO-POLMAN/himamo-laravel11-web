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
        $totalInformasi = Information::count();
        $informasiTerbaru = Information::latest()->take(3)->get();
        $totalPustaka = Libraries::count();
        $pustakaTerbaru = Libraries::latest()->take(3)->get();
        $totalPengguna = User::count();

        $informasiPopuler = Information::withCount('views')
            ->orderByDesc('views_count')
            ->take(3)
            ->get();

            $grafikViewsInformasi = Information::withCount(['views as jumlah'])
            ->get()
            ->groupBy(fn($item) => $item->created_at->format('m'))
            ->map(fn($group) => ['bulan' => $group->first()->created_at->format('F'), 'jumlah' => (int) $group->sum('jumlah')])
            ->values();



        $grafikPustaka = Libraries::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('admin.dashboard.index', compact(
            'totalInformasi',
            'informasiTerbaru',
            'totalPustaka',
            'pustakaTerbaru',
            'totalPengguna',
            'informasiPopuler',
            'grafikViewsInformasi',
            'grafikPustaka'
        ));
    }
}
