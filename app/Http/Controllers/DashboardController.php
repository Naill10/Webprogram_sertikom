<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function show() {
        $tabel_user = Complaint::with('user')->get();
        return view('admin.tabel_admin', compact('tabel_user'));
    }
    

public function store(Request $request) {
    $request->validate([
        'title'       => 'required|max:100',    
        'description' => 'required|max:500',
        'location'    => 'required|max:100',
        'photo'       => 'nullable|image|max:2048',
    ]);

    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }

    Complaint::create([
        'user_id'     => auth()->id(),
        'title'       => $request->title,
        'description' => $request->description,
        'location'    => $request->location,
        'photo'       => $photoPath,
        'status'      => 'masuk',
    ]);

    return redirect()->route('tabel_user')->with('success', 'Pengaduan berhasil ditambahkan!');
}

public function edit($id)
{
    $tabel_user = Complaint::findOrFail($id);
    return view('user.edit_pengaduan', compact('tabel_user'));
}

public function update(Request $request, $id)
{
    $complaint = Complaint::findOrFail($id);

    // handle foto jika ada yang diupload
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    } else {
        $photoPath = $complaint->photo; // tetap pakai foto lama
    }

    $complaint->update($request->validate([
        'title'       => 'required|string|max:100',
        'description' => 'required|string|max:500',
        'location'    => 'required|string|max:100',
        'status'      => 'required|in:masuk,dalam_proses,selesai,ditolak',
    ]) + ['photo' => $photoPath]);

    return redirect()->route('tabel_user')->with('success', 'Pengaduan berhasil diupdate!');
}
}
