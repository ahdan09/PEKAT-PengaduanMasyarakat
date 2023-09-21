<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\keterangan;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pengaduan::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.pengaduan.index', [
            'items' => $items
        ]);       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        $keteranganData = Keterangan::where('id_pengaduan', $id)->first();

        return view('pages.admin.pengaduan.detail', [
            'item' => $item,
            'keteranganData' => $keteranganData
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
    public function update(Request $request, $id)
    {


        $status->update($data);
        return redirect('pengaduans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pengaduan::find($id);
        $data->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('pengaduans');
    }
}
