<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\keterangan;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Options;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $roleOptions = [
            'admin' => 'Admin',
            'petugas' => 'Petugas',
            'user' => 'User',
        ];
        

        return view('pages.admin.user.add', compact('roleOptions', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'nik' => 'required|unique:users|numeric|digits:16',
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'role' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $data = User::create($validatedData);

        Alert::success('success', 'User berhasil ditambahkan');

        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roleOptions = [
            'admin' => 'Admin',
            'petugas' => 'Petugas',
            'user' => 'User',
        ];

        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('roleOptions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:users,nik,'.$id,
            'nama' => 'required|max:35',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|nullable|min:3',
        ]);

        $user = User::findOrFail($id);
        $user->nik = $request->input('nik');
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        Alert::success('success', 'User berhasil diperbarui');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
    
        $user->delete();
    
        Alert::success('success', 'User berhasil dihapus');

        return redirect()->route('users.index');
    }

    public function export()
    {
        $users = User::orderBy('nama')->get();
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $data = [
            'date' => date('d M Y'),
            'users' => $users
        ];
        $pdf = PDF::loadView('pages.admin.user.Export-User', $data);
        return $pdf->download('users.pdf');
    }
}
