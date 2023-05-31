@extends('admin.layouts.main')

@section('title', 'Data Blog')

@section('content')

<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Blog</h1>
            <!-- success alert -->
            @if (session('success'))
                <div class="alert alert-success col-lg-6 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Semua Blog</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">Tambah Blog</a>
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
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Penulis: activate to sort column descending" style="width: 92px;">Penulis</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 92px;">Judul</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 68px;">Kategori</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 73px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($blogall as $blog)
                                                <tr role="row" class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="sorting_1">{{ $blog->user->name }}</td>
                                                    <td class="sorting_1">{{ $blog->judul }}</td>
                                                    <td>{{ $blog->category->name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.blog.show', $blog->slug) }}" class="btn btn-primary btn-sm">Show</a>
                                                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                            <div class="d-flex justify-content-end">
                                                {!! $blogall->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection