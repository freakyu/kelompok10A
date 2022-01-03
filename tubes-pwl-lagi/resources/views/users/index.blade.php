@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <form class="navbar-form navbar-right" method="GET" action="/users">
                <div class="input-group">
                    <input type="text" name="cari" class="form-control" placeholder="Search dashboard...">
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
                                <h1 class="panel-title">DATA AKUN</h1>
                                @if(auth()->user()->role == 'admin')
                                    <div class="right">
                                        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
                                    </div>
                                @endif
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr> 
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Avatar</th>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Tanggal Daftar</th>
                                            @if(auth()->user()->role == 'admin')
                                                <th class="text-center">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td><a href="/users/{{ $user->id }}/detail">{{ $user->name }}</a></td>
                                            <td><img src="{{ $user->getGambar() }}" height="200px" width="200px"></td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            @if(auth()->user()->role == 'admin')
                                                <td>
                                                    <div class="btn-group-vertical">
                                                        <a class="btn btn-warning btn-sm" href="users/{{ $user->id }}/edit">Ubah</a>
                                                        <a class="btn btn-danger btn-sm" href="users/{{ $user->id }}/delete" onclick="return confirm('Apakah Anda yakin ingin mengahpus data ini?')">Hapus</a>
                                                    </div> 
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-5" style="float:right">
                                    {{ $users->links()}}
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
                    <h2 class="modal-title">Menambahkan Data User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/users/create" class="was-validated" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="role" value="pengguna">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                            <label for="avatar">Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                    {{ $errors->first('avatar') }}
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