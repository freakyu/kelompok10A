<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request) {
        if ($request->has('cari')) {
            // Mencari dan menampilkan data barang berdasarkan namanya dari database
            $data_barang = \App\Models\Barang::where('nama_barang', 'LIKE', '%'.$request->cari.'%')->paginate(3);
        } else {
            // Membagi halaman menjadi 3 item barang per halaman
            $data_barang = \App\Models\Barang::paginate(3);
        }

        return view('barang.index',['data_barang' => $data_barang]);
    }
    public function create(Request $request) {
        // Membuat beberapa aturan dalam pengisian data barang
        $this->validate($request, [
            'nama_barang' => 'required | min:5',
            'harga_barang' => 'required | numeric',
            'tipe_barang' => 'required',
            'merk_barang' => 'required',
            'deskripsi_barang' => 'required | max:500',
            'gambar_barang' => 'mimes:jpg,jpeg,png'
        ]);
        $barang = \App\Models\Barang::create($request->all());
        if($request->hasFile('gambar_barang')) {
            // Mengambil gambar dan menyimpannya di folder tujuan dengan nama asli
            $request->file('gambar_barang')->move('images/barang/', $request->file('gambar_barang')->getClientOriginalName());
            $barang->gambar_barang = $request->file('gambar_barang')->getClientOriginalName();
            $barang->save();
        }

        return redirect('/barangs')->with('tambah', ' Data Berhasil Ditambahkan!');
    }
    public function edit($id) {
        // Mengambil data dari database berdasarkan id yang dipilih lalu membuka halaman edit
        $barang = \App\Models\Barang::find($id);

        return view('barang.edit', ['barang' => $barang]);
    }
    public function update(Request $request, $id) {
        // Memilih data dari database berdasarkan id dan memperbarui data dengan fungsi update()
        // lalu kembali ke halaman tabel barang
        $barang = \App\Models\Barang::find($id);
        $barang->update($request->all());
        if($request->hasFile('gambar_barang')) {
            // Mengambil gambar dan menyimpannya di folder tujuan dengan nama asli
            $request->file('gambar_barang')->move('images/barang/', $request->file('gambar_barang')->getClientOriginalName());
            $barang->gambar_barang = $request->file('gambar_barang')->getClientOriginalName();
            $barang->save();
        }

        return redirect('/barangs')->with('edit', ' Data Berhasil Diubah!');
    }
    public function delete($id) {
        // Memilih data dari database berdasarkan id dan menghapusnya dengan fungsi delete()
        // lalu kembali ke halaman data barang
        $barang = \App\Models\Barang::find($id);
        $barang->delete();

        return redirect('/barangs')->with('hapus', ' Data Berhasil Dihapus!');
    }
    public function detail($id) {
        // Memilih data dari database berdasarkan id lalu membuka halaman detail barang
        $barang = \App\Models\Barang::find($id);

        return view('barang.detail', ['barang' => $barang]);
    }
}
