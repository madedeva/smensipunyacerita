<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Sipata | Blog </title>
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

    <script src="https://cdn.tiny.cloud/1/orocptwpsndr3juwl1xw9y3a0uj3j7pdabo7zkr9xaz82oeq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="icon" href="https://i.ibb.co/qpgRvbq/image.png" type="image/x-icon">
        
    <script>
      tinymce.init({
        selector: 'textarea#cerita',
      });
    </script>

    @yield('css')
  </head>
  <body>
	
    @include('layouts.partials.navbar')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/curhat1.jpeg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Blog Terbaru</h1>
          </div>
        </div>
      </div>
    </section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
        <!-- get blog -->
        @foreach($bloghome as $blog)
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
                <a href="{{ route('blog.show', $blog->slug) }}" class="block-20 d-flex align-items-end" style="background-image: url('{{ asset('blogs/'.$blog->gambar) }}');">
				<div class="meta-date text-center p-2">
                    <span class="day">{{ $blog->created_at->format('d') }}</span>
                    <span class="mos">{{ $blog->created_at->format('M') }}</span>
                    <span class="yr">{{ $blog->created_at->format('Y') }}</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->judul }}</a></h3>
                <p>{!! $blog->excerpt !!}</p>
                <a href="{{ route('blog.show', $blog->slug) }}">Read more</a>
                <div class="d-flex align-items-center mt-4">
                    <span>{{ $blog->category->name }}</span>
	                <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">{{ $blog->user->name }}</a>
	                </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <!-- make pagination -->
        <div class="row mt-5">
          <div class="col text-center">
              {{ $bloghome->links() }}
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