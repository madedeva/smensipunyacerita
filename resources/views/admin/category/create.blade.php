@extends('admin.layouts.main')

@section('title', 'Tambah Kategori')

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
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Tambah Kategori</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection