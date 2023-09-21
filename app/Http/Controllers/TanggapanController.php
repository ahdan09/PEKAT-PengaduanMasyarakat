<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\keterangan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $id_petugas = Auth::user()->id;
        $id_user = Auth::user()->id;

        DB::table('pengaduan')->where('id_pengaduan', $request->id_pengaduan)->update([
            'status' => $request->status,
        ]);
        
        $existingKeterangan = Keterangan::where('id_pengaduan', $request->id_pengaduan)->first();
        
        if ($existingKeterangan) {
            $existingKeterangan->update([
                'keterangan' => $request->keterangan,
                'id_petugas' => $id_petugas,
                'id_user' => $id_user,
            ]);
        } else {
            $keteranganData = [
                'id_pengaduan' => $request->id_pengaduan,
                'keterangan' => $request->keterangan,
                'id_petugas' => $id_petugas,
                'id_user' => $id_user,
            ];
        
            Keterangan::create($keteranganData);
        }
    
        $petugasOrAdmin = User::find($id_petugas);
        
        Alert::success('success', 'Pengaduan berhasil ditanggapi');
    
        return redirect()->route('pengaduan.show', [
            'pengaduan' => $request->id_pengaduan,
            'petugasOrAdmin' => $petugasOrAdmin,
        ]);
    }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tanggapan = Keterangan::findOrFail($id);
    
            $tanggapan->delete();
    
            Alert::success('Berhasil', 'Tanggapan berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menghapus tanggapan');
        }
    
        return redirect()->back();
    }
        
}
