<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\keterangan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard',[
            'isi_laporan' => Pengaduan::count(),
            'user' => User::where('role','=', 'USER')->count(),
            'petugas' => User::where('role', '=', 'PETUGAS')->count(),
            'admin' => User::where('role', '=', 'ADMIN')->count(),
            'tanggapan' => Keterangan::count(),
            'belum_diproses' => Pengaduan::where('status', Pengaduan::STATUS_BELUM_DIPROSES)->count(),
            'sedang_proses' => Pengaduan::where('status', Pengaduan::STATUS_SEDANG_PROSES)->count(),
            'selesai' => Pengaduan::where('status', Pengaduan::STATUS_SELESAI)->count(),
        ]);
    }
}
