@extends('admin.layouts.main')

@section('title', 'Detail Blog')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Blog</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Blog</h6>
            </div>
            <div class="card-body">
                <h3>{{ $blog->judul }}</h3>
                <!-- show blog image -->
                <img src="{{ asset('blogs/' . $blog->gambar) }}" class="img-fluid" style="width: 50%; height: 50%;">
                <p>{!!$blog->deskripsi!!}</p>
            </div>
        </div>
    </div>
</div>

@endsection