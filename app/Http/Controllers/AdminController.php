<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengaduan;
use App\Models\Keterangan;
use App\Models\User;
use PDF;

class AdminController extends Controller
{

    public function index($id)
    {

        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        return view('pages.admin.tanggapan.add', [
            'item' => $item
        ]);
    }
    
    public function cetak()
    {

        $pengaduan = Pengaduan::orderBy('created_at', 'DESC')->get();

        $pdf = PDF::loadview('pages.masyarakat.Export-pengaduan', [
            'pengaduan' => $pengaduan
        ]);
        return $pdf->download('laporan.pdf');
    }

}
