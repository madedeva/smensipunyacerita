@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content')

            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Admin</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Guru BK</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guru }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Siswa</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Sistem Aktif</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fas fa-cogs fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-lg-6 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, {{ Auth::user()->name }}</h6>
                            </div>
                            <div class="card-body">
                                <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong></p>
                                <p>Email anda: <strong>
                                {{ Auth::user()->email }}</strong></p>
                                <p>Jaga kerahasiaaan informasi akun anda. Jika terjadi kendala pada akun anda, segera hubungi admin.</p>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            </div>

@endsection
