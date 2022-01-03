@extends('layouts.master')

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- DETAIL HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{ asset('assets/img/user-medium.png') }}" class="img-circle" alt="">
                            </div>
                        </div>
                        <!-- END DETAIL HEADER -->
                        <!-- BARANG DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Informasi barang</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Harga
                                        <span>@currency($barang->harga_barang)</span>
                                    </li>
                                    <li>Merek
                                        <span>{{ $barang->merk_barang }}</span>
                                    </li>
                                    <li>Tipe
                                        <span>{{ $barang->tipe_barang }}</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="profile-info">
                                <h4 class="heading">Deskripsi</h4>
                                <p class="text-justify">{{ $barang->deskripsi_barang }}</p>
                            </div>
                            <div class="text-center"><a href="/barang/{{ $barang->id }}/edit" class="btn btn-primary">Edit Data</a></div>
                        </div>
                        <!-- END BARANG DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <h2 class="heading">{{ $barang->nama_barang }}</h2>
                        <!-- AWARDS -->
                        <div class="awards">
                            <div class="row">
                                <div class="col-sm">
                                    <img class="img-fluid img-thumbnail" width="400px" object-fit="cover" src="{{ $barang->getGambar() }}">
                                </div>
                            </div>
                        </div>
                        <!-- END AWARDS -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>  
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
    
@endsection