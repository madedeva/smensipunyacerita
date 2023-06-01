@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/curhat1.jpeg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<span class="subheading">Smensi Punya Cerita</span>
            <h1 class="mb-4">Layanan Curhat Online Smensi</h1>
            @if (Auth::check())
            <p><a href="/curhat" class="btn btn-primary px-4 py-3 mt-3">Bagikan Cerita</a></p>
            @else
            <p><a href="/login" class="btn btn-primary px-4 py-3 mt-3">Bagikan Cerita</a></p>
            @endif
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/curhat1.jpeg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<span class="subheading">Bercerita Dimana Saja</span>
            <h1 class="mb-4">Bebas Curhat Dengan Kerahasiaan Identitas</h1>
            @if (Auth::check())
            <p><a href="/curhat" class="btn btn-primary px-4 py-3 mt-3">Bagikan Cerita</a></p>
            @else
            <p><a href="/login" class="btn btn-primary px-4 py-3 mt-3">Bagikan Cerita</a></p>
            @endif
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          			<div class="col-md-8 text-center heading-section ftco-animate">
            			<h2 class="mb-4">Manfaat Berbagi Cerita</h2>
                  <p>Smensi punya cerita merupakan website yang menyediakan tempat bagi siswa untuk berbagi cerita dengan kerahasiaan identitas. Berikut beberapa manfaat membagikan cerita kepada orang lain.</p>
          			</div>
        		</div>
				<div class="row no-gutters justify-content-center">
					<div class="col-lg-4 d-flex">
						<div class="services-2 noborder-left text-center ftco-animate">
							<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
							<div class="text media-body">
								<h3>Memahami Emosi</h3>
								<p>Membantu siswa untuk mengungkapkan atau memahami emosi.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 d-flex">
						<div class="services-2 text-center ftco-animate">
							<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
							<div class="text media-body">
								<h3>Mengembangkan Sudut Pandang</h3>
								<p>Mampu mengembangkangkan pemikiran siswa melalui sudut pandang yang baru.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 d-flex">
						<div class="services-2 text-center ftco-animate">
							<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
							<div class="text media-body">
								<h3>Menemukan Solusi Permasalahan</h3>
								<p>Membantu siswa untuk menemukan solusi dari sebuah permasalahan.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 d-flex">
						<div class="services-2 noborder-left noborder-bottom text-center ftco-animate">
							<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
							<div class="text media-body">
								<h3>Memahami Diri Sendiri</h3>
								<p>Membantu siswa untuk lebih memahami dirinya sendiri, orang lain, dan lingkungannya.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 d-flex">
						<div class="services-2 text-center noborder-bottom ftco-animate">
							<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"></span></div>
							<div class="text media-body">
								<h3>Mengembangkan Potensi Diri</h3>
								<p>Membantu siswa untuk lebih mengembangkan diri, sehingga dapat menggunakan potensi yang ada secara optimal.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section bg-light testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Cerita Terbaru</h2>
            <p>Smensi punya cerita memberikan hak kepada siswa untuk membagikan cerita secara publik dan privat. Berikut adalah cerita yang dibagikan secara publik.</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
            @foreach ($curhats as $item)
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <strong>{{ $item->title }}</strong>
                    <a href="{{ route('curhat.showDetail', $item->slug) }}">
                      <p class="text-muted">{{ $item->excerpt }}</p>
                    </a>
                    <p class="text-muted mt-6">
                      {{ $item->created_at->diffForHumans() }}
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
