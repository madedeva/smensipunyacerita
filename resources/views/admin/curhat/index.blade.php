@extends('admin.layouts.main')

@section('title', 'Cerita Siswa')

@section('content')

<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Cerita</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Cerita Siswa</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <!-- only admin -->
                                                    @if (Auth::user()->role == 'admin')
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 92px;">Nama Siswa</th>
                                                    @endif
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 92px;">Topik</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 68px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Tanggal Masuk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 73px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($curhatall as $curhat)
                                                <tr role="row" class="odd">
                                                    @if (Auth::user()->role == 'admin')
                                                    <td class="sorting_1">{{ $curhat->user->name }}</td>
                                                    @endif
                                                    <td class="sorting_1">{{ $curhat->title }}</td>
                                                    <td>{{ $curhat->status }}</td>
                                                    <td>{{ $curhat->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <!-- if feedback value 'Tidak ada' -> btn warning, else btn success on edit -->
                                                        @if($curhat->feedback == 'Tidak ada')
                                                        <a href="{{ route('admin.curhat.edit', $curhat->id) }}" class="btn btn-warning btn-sm">Balas</a>
                                                        @else
                                                        <!-- btn but cant click -->
                                                        <a href="#" class="btn btn-success btn-sm disabled">Sudah dibalas</a>
                                                        @endif
                                                        <form action="{{ route('admin.curhat.destroy', $curhat->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                        <!-- show -->
                                                        <a href="{{ route('admin.curhat.show', $curhat->id) }}" class="btn btn-info btn-sm">Detail</a>
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
                                                {!! $curhatall->links() !!}
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