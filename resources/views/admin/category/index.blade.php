@extends('admin.layouts.main')

@section('title', 'Blog Kategori')

@section('content')

<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kategori</h1>
            <!-- success alert -->
            @if (session('success'))
                <div class="alert alert-success col-lg-6 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Blog</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">Tambah Kategori</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 92px;">Nomor</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 133px;">Nama Kategori</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 62px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categoryall as $ct)
                                                <tr role="row" class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $ct->name }}</td>
                                                    <td>
                                                    <a href="{{ route('admin.category.edit', $ct->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.category.destroy', $ct->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Import Excel -->
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('admin.users.import_excel') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Akun</h5>
                            </div>
                            <div class="modal-body">
    
                                {{ csrf_field() }}
    
                                <label>Pilih file</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Import Excel -->
        </div>
    </div>
</div>

@endsection