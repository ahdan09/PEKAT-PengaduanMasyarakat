<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Keterangan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->nik;

        return view('pages.masyarakat.index', ['liat' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.masyarakat.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:80',
            'isi_laporan' => 'required|string',
            'foto' => 'image|required|mimes:jpeg,png,jpg',
        ]);

        if (Auth::check()) {
            $pengaduan = new Pengaduan();
            $pengaduan->id_user = Auth::user()->id;
            $pengaduan->tgl_pengaduan = now();
            $pengaduan->nik = Auth::user()->nik;
            $pengaduan->judul = $validatedData['judul'];
            $pengaduan->isi_laporan = $validatedData['isi_laporan'];
            $pengaduan->status = 'belum diproses';

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('public/fotos');
                $pengaduan->foto = $fotoPath;
            }

            $pengaduan->save();

            // notifikasi
            Alert::success('Laporan Terkirim', 'Laporan Anda telah berhasil dikirim.');

            return redirect()->route('lihat.pengaduan');
        } else {
            // Handle case when user is not logged in
        }
    }

    public function lihat()
    {
        $user = Auth::user()->pengaduan()->orderBy('created_at', 'DESC')->get();

        return view('pages.masyarakat.data', [
            'items' => $user
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Pengaduan::with([
            'details','User'
        ])->findOrFail($id);
    
        $ktrgan = Keterangan::where('id_pengaduan', $id)->first();
    
        // Mengambil data petugas atau admin yang memberikan tanggapan
        $petugasOrAdmin = null;
        if ($ktrgan && $ktrgan->id_petugas) {
            $petugasOrAdmin = User::find($ktrgan->id_petugas); // Gantilah sesuai dengan field yang benar
        }
    
        return view('pages.masyarakat.show', [
            'item' => $item,
            'ktrgan' => $ktrgan,
            'petugasOrAdmin' => $petugasOrAdmin, // Mengirim data petugas atau admin ke blade
        ]);
    }
    
            /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
