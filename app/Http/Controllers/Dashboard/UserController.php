<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('username', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);
            $roles = Role::pluck('name', 'name'); // Ambil semua nama role
return view('admin.dashboard.user.index', compact('users', 'roles'));

    }


public function store(Request $request)
{
    $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:users'],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'exists:roles,name'], // pastikan role dikirim dari form
    ]);

    $user = User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $user->assignRole($request->role); // Spatie assigns role

    return redirect()->route('user.index')->with('success', 'Pengguna berhasil dibuat.');
}


    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name'); // Ambil semua nama role
    return view('admin.dashboard.user.edit', compact('user', 'roles'));
    }

public function update(Request $request, User $user)
{
    $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'exists:roles,name'],
    ]);

    $user->update([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);

    $user->syncRoles([$request->role]); // Ganti role sebelumnya dengan yang baru

    return redirect()->route('user.index')->with('success', 'Pengguna berhasil diperbarui.');
}

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
