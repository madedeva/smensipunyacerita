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

    <section class="ftco-section">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-12 wrap-about ftco-animate fadeInUp ftco-animated">
          	            <h2 class="mb-4">{{ $curhats->title }}</h2>
                        <!-- date with icon -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> {{ $curhats->created_at->format('d M Y') }}</a></div>
                                    <div><a href="#"><span class="icon-person"></span> {{ $curhats->user->name }}</a></div>
                                </div>
                            </div>
                        </div>
                        <p>{!! $curhats->cerita !!}</p>
					          </div>
                    <!-- tanggal difforhuman date moth and year -->
                    <div class="col-md-12 wrap-about ftco-animate fadeInUp ftco-animated">
                        <span>Status : {{ $curhats->status }}</span>
                        <!-- edti and delete button -->
                        <div class="row">
                            <div class="col-md-12">
                                    <form action="{{ route('curhat.destroy', $curhats->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus curhatan ini?')">Hapus <ion-icon name="trash-outline"></ion-icon></button>
                                    </form>
                            </div>
                            <div class="col-md-12 mt-4">
                                <a href="{{ route('curhat.mycurhat') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4 wrap-about ftco-animate fadeInUp ftco-animated">
                        <h2 class="mb-4">Balasan</h2>
                        <!-- if feedback = Tidak ada, showing none, else show feedback -->
                        @if($curhats->feedback == 'Tidak ada')
                        <p>Belum ada balasan</p>
                        @else
                        <p>{!! $curhats->feedback !!}</p>
                        @endif
                    </div>
				</div>
			</div>
		</section>


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

