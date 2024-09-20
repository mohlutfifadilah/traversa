<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $armada = Armada::all();
        return view('admin.armada.index', compact('armada'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('admin.armada.armada_add', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'nama_armada' => 'required',
            'kapasitas' => 'required',
            'berat' => 'required',
        ],
        [
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'kategori.required' => 'Kategori harus diisi',
            'nama_armada.required' => 'Nama Armada harus diisi',
            'kapasitas.required' => 'Kapasitas harus diisi',
            'berat.required' => 'Berat harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Tambah Armada', 'type' => 'error']);
        }

        if (Armada::where('nama_armada', $request->nama_armada)->exists()) {
            return redirect()->back()->withInput()->with('nama_armada', 'Nama Armada sudah digunakan');
        }

        $kategori = Kategori::find($request->kategori);

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('foto', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('armada/' . $kategori->nama_kategori);
            $file->move('storage/armada/' . $kategori->nama_kategori . '/', $image);
            $image = str_replace('armada/' . $kategori->nama_kategori . '/', '', $image);
            // if($profil->foto){
            //     unlink(storage_path('app/kegiatan/' . $profil->nama . '/' . $profil->foto));
            //     unlink(public_path('storage/kegiatan/' . $profil->nama . '/' . $profil->foto));
            // }
        } else {
            $image = null;
        }

        Armada::create([
            'id_kategori' => $request->kategori,
            'foto' => $image,
            'nama_armada' => $request->nama_armada,
            'kapasitas' => $request->kapasitas,
            'berat' => $request->berat,
        ]);

        Alert::alert('Berhasil', 'Armada berhasil ditambahkan ', 'success');
        return redirect()->route('armada.index')->withSuccess('Armada berhasil ditambahkan');
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
        $armada = Armada::find($id);
        $kategori = Kategori::all();
        return view('admin.armada.armada_edit', compact('armada', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $armada = Armada::find($id);
        $kategori = Kategori::find($armada->id_kategori);

        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required',
            'nama_armada' => 'required',
            'kapasitas' => 'required',
            'berat' => 'required',
        ],
        [
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'kategori.required' => 'Kategori harus diisi',
            'nama_armada.required' => 'Nama Armada harus diisi',
            'kapasitas.required' => 'Kapasitas harus diisi',
            'berat.required' => 'Berat harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Ubah Armada', 'type' => 'error']);
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->nama_armada != $armada->nama_armada){
            if (Armada::where('nama_armada', $request->nama_armada)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('nama_armada', 'Nama Armada sudah digunakan!');
            }
        }

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('foto', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('armada/' . $kategori->nama_kategori);
            $file->move('storage/armada/' . $kategori->nama_kategori . '/', $image);
            $image = str_replace('armada/' . $kategori->nama_kategori . '/', '', $image);
            if($armada->foto){
                unlink(storage_path('app/armada/' . $kategori->nama_kategori . '/' . $armada->foto));
                unlink(public_path('storage/armada/' . $kategori->nama_kategori . '/' . $armada->foto));
            }
        } else {
            $image = $armada->foto;
        }

        $armada->update([
            'id_kategori' => $request->kategori,
            'foto' => $image,
            'nama_armada' => $request->nama_armada,
            'kapasitas' => $request->kapasitas,
            'berat' => $request->berat,
        ]);

        Alert::alert('Berhasil', 'Armada berhasil diubah ', 'success');
        return redirect()->route('armada.index')->withSuccess('Armada berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $armada = Armada::find($id);
        $kategori = Kategori::find($armada->id_kategori);

        if($armada->foto){
            unlink(storage_path('app/armada/' . $kategori->nama_kategori . '/' . $armada->foto));
            unlink(public_path('storage/armada/' . $kategori->nama_kategori . '/' . $armada->foto));
        }
        $armada->delete();

        Alert::alert('Berhasil', 'Armada berhasil dihapus ', 'success');
        return redirect()->route('armada.index')->withSuccess('Data Armada berhasil dihapus');
    }
}
