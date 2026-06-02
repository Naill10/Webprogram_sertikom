<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Complaint;
class ResponseController extends Controller
{
    public function store(Request $request, $complaint_id)
    {
        $request->validate([
            'response' => 'required|string|max:500',
            'status'   => 'required|in:masuk,proses,selesai,ditolak',
        ]);

        Response::create([
            'complaint_id' => $complaint_id,
            'admin_id'     => auth()->id(),
            'response'     => $request->response,
        ]);

        Complaint::where('id', $complaint_id)->update(['status' => $request->status]);
        return redirect()->route('complaint.respon', $complaint_id)->with('success', 'Respon berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $response = Response::findOrFail($id);
        $response->delete();
        return redirect()->back()->with('success', 'Respon berhasil dihapus!');
    }

    public function show($id)
    {
        $complaint = Complaint::with('responses.admin')->findOrFail($id);
        return view('admin.response_admin', compact('complaint'));
    }

    public function respon()
    {
        $responses   = Response::with(['complaint.user', 'admin'])->latest()->get();
        return view('admin.respon-tabel', compact('responses'));
    }
}
