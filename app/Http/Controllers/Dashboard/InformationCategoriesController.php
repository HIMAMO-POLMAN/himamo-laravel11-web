<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\InformationCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformationCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $information_category = InformationCategories::query();

        if ($search) {
            $information_category->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%");
        }

        $information_category = $information_category->paginate(10);

        return view('admin.dashboard.ae-information.categories.index', compact('information_category'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:information_categories|max:255',
        ], [
            'name.required' => 'Nama wajib diisi',
        ]);

        InformationCategories::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('information-categories.index')->with('success', 'Kategori Informasi berhasil dibuat.');
    }

    public function edit(InformationCategories $information_category)
    {
        return view('admin.dashboard.ae-information.categories.edit', compact('information_category'));
    }

    public function update(Request $request, InformationCategories $information_category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:information_categories,name,' . $information_category->id,
        ]);

        $information_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('information-categories.index')->with('success', 'Kategori Informasi berhasil diperbarui.');
    }

    public function destroy(InformationCategories $information_category)
    {

        $information_category->delete();

        return redirect()->route('information-categories.index')->with('success', 'Pengguna berhasil dihapus.');;
    }
}
