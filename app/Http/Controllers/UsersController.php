<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::where('id', '!=', Auth::user()->id)->get();
        // $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.users_add');
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
            'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            // 'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Tambah Pengguna', 'type' => 'error']);
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->with('email', 'Format Email tidak valid');
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('email', 'Email sudah digunakan');
        }

        // $jenjang = Jenjang::where('nama_jenjang', '=', $request->jenjang)->first();
        User::create([
            'foto' => null,
            // 'id_jenjang' => $jenjang->id,
            'email' => $request->email,
            'password' => Hash::make($request->email)
        ]);

        Alert::alert('Berhasil', 'Pengguna berhasil ditambahkan ', 'success');
        return redirect()->route('users.index')->withSuccess('Pengguna berhasil ditambahkan');
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
        $user = User::find($id);
        return view('admin.users.users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            // 'role' => 'required',
            // 'jenjang' => 'required',
            'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            // 'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Ubah Pengguna', 'type' => 'error']);
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->with('email', 'Format Email tidak valid');
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->email != $user->email){
            if (User::where('email', $request->email)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('email', 'Email sudah digunakan!');
            }
        }

        $user->update([
            // 'id_role' => $request->role,
            'email' => $request->email,
            // 'password' => Hash::make($request->password)
        ]);

        Alert::alert('Berhasil', 'Pengguna berhasil diubah ', 'success');
        return redirect()->route('users.index')->withSuccess('Pengguna berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        if($user->foto){
            unlink(storage_path('app/profil/' . $user->foto));
            unlink(public_path('storage/profil/' . $user->foto));
          }
        $user->delete();

        Alert::alert('Berhasil', 'Pengguna berhasil dihapus ', 'success');
        return redirect()->route('users.index')->withSuccess('Data Pengguna berhasil dihapus');
    }
}
