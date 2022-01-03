@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Data Akun</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/users/{{ $users->id }}/update" class="needs-validation" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="nama_user">Nama</label>
                                        <input type="text" class="form-control" id="nama_user" placeholder="Masukkan Nama Akun" name="name" value="{{ $users->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" placeholder="Masukkan Tipe Akun" name="role" value="{{ $users->role }}" required>
                                            <option value="admin">Admin</option>
                                            <option value="pengguna">Pengguna</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="{{ $users->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $users->avatar }}">
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