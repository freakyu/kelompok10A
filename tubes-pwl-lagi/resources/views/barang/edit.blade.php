@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Data Barang</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/barang/{{ $barang->id }}/update" class="needs-validation" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan Nama Barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_barang">Harga Barang</label>
                                        <input type="text" class="form-control" id="harga_barang" placeholder="Masukkan Harga Barang" name="harga_barang" value="{{ $barang->harga_barang }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_barang">Tipe Barang</label>
                                        <select class="form-control" id="tipe_barang" placeholder="Masukkan Tipe Barang" name="tipe_barang" value="{{ $barang->tipe_barang }}" required>
                                            <option value="Motherboard">Motherboard</option>
                                            <option value="Processor">Processor</option>
                                            <option value="RAM">RAM</option>
                                            <option value="Storage">Storage</option>
                                            <option value="VGA">VGA</option>
                                            <option value="Case">Case</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="merk_barang">Merk Barang</label>
                                        <input type="text" class="form-control" id="merk_barang" placeholder="Masukkan Merk Barang" name="merk_barang" value="{{ $barang->merk_barang }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_barang">Deskripsi Barang</label>
                                        <textarea class="form-control" rows="3" id="deskripsi_barang" placeholder="Masukkan Deskripsi Barang" name="deskripsi_barang" required>{{ $barang->deskripsi_barang }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar_barang">Gambar Barang</label>
                                        <input type="file" class="form-control" id="gambar_barang" name="gambar_barang" value="{{ $barang->gambar_barang }}">
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-block">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection