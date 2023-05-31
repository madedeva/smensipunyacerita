<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Sipata | Detail Cerita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="icon" href="https://i.ibb.co/qpgRvbq/image.png" type="image/x-icon">

    @yield('css')
  </head>
  <body>
	
    @include('layouts.partials.navbar')

    <section class="ftco-section">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-12 wrap-about ftco-animate fadeInUp ftco-animated">
          	            <h2 class="mb-4">{{ $blog->judul }}</h2>
                        <!-- date with icon -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> {{ $blog->created_at->format('d M Y') }}</a></div>
                                    <div><a href="#"><span class="icon-person"></span> {{ $blog->user->name }}</a></div>
                                </div>
                                <!-- get image with radius -->
                                <div class="text-left mt-3">
                                    <img src="{{ asset('blogs/'.$blog->gambar) }}" alt="" class="img-fluid rounded" width="50%">
                                </div>
                            </div>
                        </div>
                        <p>{!! $blog->deskripsi !!}</p>
					</div>
                    <div class="col-md-12 wrap-about ftco-animate fadeInUp ftco-animated">
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <a href="/blog" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</section>

    @include('layouts.partials.footer')


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/google-map.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/editor.js') }}"></script>
    
  </body>
</html>