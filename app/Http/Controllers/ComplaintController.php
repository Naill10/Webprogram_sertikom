<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
   public function index() {
        $tabel_user = Complaint::with('user')
        ->where('user_id', auth()->id())
        ->get();
        return view('user.tabel_user', compact('tabel_user'));
    }

    public function form() {
       return view('user.create');
    }

   

public function destroy($id) {
    $complaint = Complaint::findOrFail($id);
    if ($complaint->user_id !== auth()->id()) {
        return redirect()->route('tabel_user')->with('error', 'Anda tidak memiliki izin untuk menghapus pengaduan ini.');
    }
    $complaint->delete();
    return redirect()->route('tabel_user')->with('success', 'Pengaduan berhasil dihapus!');
}


}
