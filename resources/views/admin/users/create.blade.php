@extends('admin.layouts.main')

@section('title', 'Tambah Akun')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg-12">
                <h1 class="h3 mb-0 text-gray-800">Tambah Akun</h1>
                <!-- success alert -->
                @if (session('success'))
                    <div class="alert alert-success col-lg-6 mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Akun Pengguna</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Pilih Role</label>
                            <select class="form-control" name="role" aria-label="Default select example">
                                <option selected>Pilih role pengguna</option>
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Tambah Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection