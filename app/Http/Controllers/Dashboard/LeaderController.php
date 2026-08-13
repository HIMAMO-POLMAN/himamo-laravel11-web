<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::orderByDesc('period_start')->paginate(10);

        return view('admin.leader.index', compact('leaders'));
    }

    public function store(Request $request)
    {
        $request->merge(['is_active' => $request->boolean('is_active')]);
        $validated = $this->validateData($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('leaders', 'public');
        }

        Leader::create($validated);

        return redirect()->route('ae-leader.index')->with('success', 'Data ketua himpunan berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $request->validate(['leader_id' => 'required|exists:leaders,id']);
        $leader = Leader::findOrFail($request->leader_id);

        $request->merge(['is_active' => $request->boolean('is_active')]);
        $validated = $this->validateData($request);

        if ($request->hasFile('image')) {
            if ($leader->image) {
                Storage::disk('public')->delete($leader->image);
            }
            $validated['image'] = $request->file('image')->store('leaders', 'public');
        }

        $leader->update($validated);

        return redirect()->route('ae-leader.index')->with('success', 'Data ketua himpunan berhasil diperbarui.');
    }

    public function destroy(Leader $leader)
    {
        if ($leader->image) {
            Storage::disk('public')->delete($leader->image);
        }

        $leader->delete();

        return redirect()->route('ae-leader.index')->with('success', 'Data ketua himpunan berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name'         => 'required|string|max:255',
            'nim'          => 'nullable|string|max:50',
            'position'     => 'required|string|max:255',
            'period_start' => 'required|string|max:10',
            'period_end'   => 'required|string|max:10',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'linkedin'     => 'nullable|url|max:255',
            'is_active'    => 'boolean',
        ]);
    }
}
