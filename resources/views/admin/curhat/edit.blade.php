@extends('admin.layouts.main')

@section('title', 'Balas Cerita')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Balas Cerita</h1>
            <!-- success alert -->
            @if (session('success'))
                <div class="alert alert-success col-lg-6 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cerita Siswa</h6>
            </div>
            <div class="card-body">
                <h3>{{ $curhat->title }}</h3>
                <p>{!! $curhat->cerita !!}</p>
                
                <form action="{{ route('admin.curhat.update', $curhat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input id="feedback" type="hidden" name="feedback" value="{{ old('feedback', $curhat->feedback) }}">
                    <trix-editor input="feedback"></trix-editor>
                    <!-- <textarea id="cerita" name="feedback">{{ $curhat->feedback }}</textarea> -->
                    <button type="submit" class="btn btn-primary btn-sm mt-4">Kirim balasan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection