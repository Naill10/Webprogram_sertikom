<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
   public function index() {
        $tabel_user = Complaint::with('user')->get();
        return view('pages.tabel_user', compact('tabel_user'));
    }

    public function form() {
       return view('pages.tambah_pengaduan-user');
    }

    public function store(Request $request) {
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
        'status'      => 'pending',
    ]);

    return redirect()->route('tabel_user')->with('success', 'Pengaduan berhasil ditambahkan!');
}
}
