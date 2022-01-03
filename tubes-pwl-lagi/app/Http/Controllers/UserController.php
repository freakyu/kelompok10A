<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request) {
        // Mencari dan menampilkan data user berdasarkan namanya dari database
        if ($request->has('cari')) {
            $users = \App\Models\User::where('name', 'LIKE', '%'.$request->cari.'%')->paginate(3);
        } else {
            // Membagi halaman menjadi 3 item user per halaman
            $users = \App\Models\User::paginate(3);
        }

        return view('users.index',['users' => $users]);
    }

    public function create(Request $request) {
        // Membuat beberapa aturan dalam pengisian data user
        $this->validate($request, [
            'name' => 'required | min:5',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);
        $users = \App\Models\User::create($request->all());
        if($request->hasFile('avatar')) {
            // Mengambil gambar dan menyimpannya di folder tujuan dengan nama asli
            $request->file('avatar')->move('images/avatars/', $request->file('avatar')->getClientOriginalName());
            $users->avatar = $request->file('avatar')->getClientOriginalName();
            $users->save();
        }

        return redirect('/users')->with('tambah', ' Data Berhasil Ditambahkan!');
    }

    public function edit($id) {
        // Mengambil data dari database berdasarkan id yang dipilih lalu membuka halaman edit
        $users = \App\Models\User::find($id);

        return view('users.edit', ['users' => $users]);
    }

    public function update(Request $request, $id) {
        // Memilih data dari database berdasarkan id dan memperbarui data dengan fungsi update()
        // lalu kembali ke halaman tabel user
        $users = \App\Models\User::find($id);
        $users->update($request->all());
        if($request->hasFile('avatar')) {
            // Mengambil gambar dan menyimpannya di folder tujuan dengan nama asli
            $request->file('avatar')->move('images/avatars/', $request->file('avatar')->getClientOriginalName());
            $users->avatar = $request->file('avatar')->getClientOriginalName();
            $users->save();
        }

        return redirect('/users')->with('edit', ' Data Berhasil Diubah!');
    }

    public function delete($id) {
        // Memilih data dari database berdasarkan id dan menghapusnya dengan fungsi delete()
        // lalu kembali ke halaman data user
        $users = \App\Models\User::find($id);
        $users->delete();

        return redirect('/users')->with('hapus', ' Data Berhasil Dihapus!');
    }
    public function detail($id) {
        // Memilih data dari database berdasarkan id lalu membuka halaman detail user
        $users = \App\Models\User::find($id);

        return view('users.detail', ['users' => $users]);
    }


}
