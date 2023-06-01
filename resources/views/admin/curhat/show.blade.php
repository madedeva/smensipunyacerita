@extends('admin.layouts.main')

@section('title', 'Balas Cerita')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Cerita</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cerita Siswa</h6>
            </div>
            <div class="card-body">
                <h3>{{ $curhat->title }}</h3>
                <p>{!! $curhat->cerita !!}</p>

                <a href="{{ route('admin.curhat.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection