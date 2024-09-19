<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.kategori.kategori_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            // 'role' => 'required',
            // 'jenjang' => 'required',
            'nama_kategori' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            // 'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Tambah Nama Kategori', 'type' => 'error']);
        }

        // $jenjang = Jenjang::where('nama_jenjang', '=', $request->jenjang)->first();
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        Alert::alert('Berhasil', 'Nama Kategori berhasil ditambahkan ', 'success');
        return redirect()->route('kategori.index')->withSuccess('Nama Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kategori = Kategori::find($id);
        return view('admin.kategori.kategori_edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $kategori = Kategori::find($id);

        $validator = Validator::make($request->all(), [
            // 'role' => 'required',
            // 'jenjang' => 'required',
            'nama_kategori' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            // 'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Ubah Nama Kategori', 'type' => 'error']);
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->nama_kategori != $kategori->nama_kategori){
            if (Kategori::where('nama_kategori', $request->nama_kategori)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('nama_kategori', 'Nama Kategori sudah digunakan!');
            }
        }

        $kategori->update([
            // 'id_role' => $request->role,
            'nama_kategori' => $request->nama_kategori,
            // 'password' => Hash::make($request->password)
        ]);

        Alert::alert('Berhasil', 'Nama Kategori berhasil diubah ', 'success');
        return redirect()->route('kategori.index')->withSuccess('Nama Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategori = Kategori::find($id);
        $kategori->delete();

        Alert::alert('Berhasil', 'Nama Kategori berhasil dihapus ', 'success');
        return redirect()->route('kategori.index')->withSuccess('Nama Kategori berhasil dihapus');
    }
}
