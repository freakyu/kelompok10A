@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <form class="navbar-form navbar-right" method="GET" action="/barangs">
                <div class="input-group">
                    <input type="text" name="cari" class="form-control" placeholder="Cari Barang...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Go</button>
                    </span>
                </div>
            </form>
            @if (session('tambah'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check-circle"></i>{{ session('tambah') }}
                </div>
            @elseif (session('edit'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check-circle"></i>{{ session('edit') }}
                </div>
            @elseif (session('hapus'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check-circle"></i>{{ session('hapus') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h1 class="panel-title">DATA BARANG</h1>
                                <div class="right">
                                    <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Tipe</th>
                                            <th class="text-center">Merek</th>
                                            <th class="text-center">Deskripsi</th>
                                            @if(auth()->user()->role == 'admin')
                                                <th class="text-center">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_barang as  $barang)
                                        <tr>
                                            <td><a href="/barang/{{ $barang->id }}/detail">{{ $barang->nama_barang }}</a></td>
                                            <td><img src="{{ $barang->getGambar() }}" height="100" width="100px"></td>
                                            <td>@currency($barang->harga_barang)</td>
                                            <td>{{ $barang->tipe_barang }}</td>
                                            <td>{{ $barang->merk_barang }}</td>
                                            <td>{{ $barang->deskripsi_barang }}</td>
                                            @if(auth()->user()->role == 'admin')
                                                <td>
                                                    <div class="btn-group-vertical">
                                                        <a class="btn btn-warning btn-sm" href="barang/{{ $barang->id }}/edit">Ubah</a>
                                                        <a class="btn btn-danger btn-sm" href="barang/{{ $barang->id }}/delete" onclick="return confirm('Apakah Anda yakin ingin mengahpus data ini?')">Hapus</a>
                                                    </div> 
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- Memunculkan tombol navigasi --}}
                                <div class="mt-5" style="float:right">
                                    {{ $data_barang->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Menambahkan Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/barang/create" class="was-validated" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('nama_barang') ? 'has-error' : '' }}">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan Nama Barang" name="nama_barang">
                            @if ($errors->has('nama_barang'))
                                <span class="help-block">
                                    {{ $errors->first('nama_barang') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('harga_barang') ? 'has-error' : '' }}">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control" id="harga_barang" placeholder="Masukkan Harga Barang" name="harga_barang">
                            @if ($errors->has('harga_barang'))
                                <span class="help-block">
                                    {{ $errors->first('harga_barang') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tipe_barang">Tipe Barang</label>
                            <select class="form-control" id="tipe_barang" placeholder="Masukkan Tipe Barang" name="tipe_barang">
                                <option value="Motherboard">Motherboard</option>
                                <option value="Processor">Processor</option>
                                <option value="RAM">RAM</option>
                                <option value="Storage">Storage</option>
                                <option value="VGA">VGA</option>
                                <option value="Case">Case</option>
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('merk_barang') ? 'has-error' : '' }}">
                            <label for="merk_barang">Merk Barang</label>
                            <input type="text" class="form-control" id="merk_barang" placeholder="Masukkan Merk Barang" name="merk_barang">
                            @if ($errors->has('merk_barang'))
                                <span class="help-block">
                                    {{ $errors->first('merk_barang') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('deskripsi_barang') ? 'has-error' : '' }}">
                            <label for="deskripsi_barang">Deskripsi Barang</label>
                            <textarea class="form-control" rows="3" id="deskripsi_barang" placeholder="Masukkan Deskripsi Barang" name="deskripsi_barang"></textarea>
                            @if ($errors->has('deskripsi_barang'))
                                <span class="help-block">
                                    {{ $errors->first('deskripsi_barang') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('gambar_barang') ? 'has-error' : '' }}">
                            <label for="gambar_barang">Gambar Barang</label>
                            <input type="file" class="form-control" id="gambar_barang" placeholder="Masukkan Gambar Barang" name="gambar_barang">
                            @if ($errors->has('gambar_barang'))
                                <span class="help-block">
                                    {{ $errors->first('gambar_barang') }}
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>                          
@endsection