<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Menyatakan jika tabel yang dipakai berbeda dengan tabel bawaan model
    protected $table = 'barang';
    // Menyatakan kolom data yang dapat diisi
    protected $fillable = ['nama_barang', 'harga_barang', 'tipe_barang', 'merk_barang', 'deskripsi_barang', 'gambar_barang'];

    public function getGambar() {
        // Mengganti gambar barang dengan gambar default
        // jika tidak dimasukkan saat tambah data
        if(!$this->gambar_barang) {
            return asset('images/default.png');
        }

        return asset('images/barang/'.$this->gambar_barang);
    }
}
