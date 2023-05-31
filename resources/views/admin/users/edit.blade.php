@extends('admin.layouts.main')

@section('title', 'Ubah Akun')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg-12">
                <h1 class="h3 mb-0 text-gray-800">Ubah Akun</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Akun Pengguna</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Ubah Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection