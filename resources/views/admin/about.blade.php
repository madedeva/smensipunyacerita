@extends('admin.layouts.main')

@section('title', 'About System')

@section('content')

            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">About System</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-lg-6 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">System Information Details</h6>
                            </div>
                            <div class="card-body">
                                <p>Tim Pengembang: <strong>KKN Kependidikan 2023</strong></p>
                                <p>Lokasi: <strong>SMK Negeri 1 Singaraja</strong></p>
                                <p>Sistem ini dikembangkan dengan PHP Framework <strong><a class="text-decoration-none" href="https://laravel.com/">Laravel 9.</a>
                                </strong>Kunjungi laman github repository <strong><a class="text-decoration-none" href="https://github.com/madedeva/smensipunyacerita">disini.</a></strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            </div>

@endsection
