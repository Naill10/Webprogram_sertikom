<?php

namespace App\Http\Controllers;
use App\Models\Complaint;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $tabel_user = Complaint::with('user')->get();
        return view('pages.tabel_user', compact('tabel_user'));
    }
}
