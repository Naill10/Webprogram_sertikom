<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    // ← TAMBAH INI
    public function index()
    {
        $admins = User::where('role', 'admin')->latest()->paginate(10);
        return view('admin.crud-admin', compact('admins'));
    }

    public function create()
    {
        return view('admin.create-crud-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|string|in:admin,user',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('crud-admin')
                         ->with('success', 'Admin berhasil ditambahkan!');
    }

   public function destroy($id)
{
    $admin = User::findOrFail($id);

    if ($admin->id === auth()->id()) {
        return redirect()->route('crud-admin')->with('error', 'Anda tidak bisa menghapus akun sendiri.');
    }

    $admin->delete();
    return redirect()->route('crud-admin')->with('success', 'Admin berhasil dihapus!');
}
public function edit($id)
{
    $admin = User::findOrFail($id);
    return view('admin.edit-crud-admin', compact('admin'));
}

public function update(Request $request, $id)
{
    $admin = User::findOrFail($id);

    $rules = [
        'name'  => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'role'  => 'required|string|in:admin,user',
    ];

    // Password opsional, hanya diupdate kalau diisi
    if ($request->filled('password')) {
        $rules['password'] = 'required|string|min:8|confirmed';
    }

    $data = $request->validate($rules);

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    } else {
        unset($data['password']);
    }

    $admin->update($data);
    return redirect()->route('crud-admin')->with('success', 'Admin berhasil diupdate!');
}
}

    