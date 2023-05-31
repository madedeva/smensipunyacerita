@extends('admin.layouts.main')

@section('title', 'Ubah Blog')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg-12">
                <h1 class="h3 mb-0 text-gray-800">Ubah Blog</h1>
                <!-- success alert -->
                @if (session('success'))
                    <div class="alert alert-success col-lg-6 mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- error alert -->
                @if (session('error'))
                    <div class="alert alert-danger col-lg-6 mt-3" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Blog</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $blog->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Thumbnail</label>
                            @if($blog->gambar)
                                <img src="{{ asset('blogs/' . $blog->gambar) }}" class="img-preview img-fluid mb-3 d-block" width="25%">
                            @else
                                <img class="img-preview img-fluid mb-3">
                            @endif
                            <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Pilih Kategori</label>
                            <select class="custom-select" id="category_id" name="category_id">
                                <option selected>Pilih kategori...</option> 
                                <!-- get old caregory and other category -->
                                @foreach ($category as $ct)
                                    <option value="{{ $ct->id }}" {{ $ct->id == $blog->category_id ? 'selected' : '' }}>{{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Konten</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $blog->deskripsi) }}">
                        <trix-editor input="deskripsi"></trix-editor>

                        <!-- <textarea id="cerita" name="deskripsi"></textarea> -->
                        <button type="submit" class="btn btn-primary mt-4">Ubah Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection