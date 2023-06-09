<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Sipata | Bagikan Cerita </title>
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

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

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

      <section>
        <div class="container">
            <form action="{{ route('curhat.store') }}" method="POST" enctype="multipart/formdata">
                @csrf
                <div class="mb-3 mt-3">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Topik" required>
                  </div>
                    <input id="cerita" type="hidden" name="cerita" required="required">
                    <trix-editor input="cerita"></trix-editor>
                  <!-- <textarea id="cerita" name="cerita" require></textarea> -->
                  <div class="option mb-3 mt-3">
                        <span>Pilih status curhatan anda</span>
                        <select name="status" id="status" class="form-control" required>
                          <option value="">Pilih status</option>
                          <option value="public">Bagikan sebagai public</option>
                          <option value="private">Bagikan sebagai private</option>
                          </select>
                    </div>
                    <!-- feedback type hidden value = Tidak ada -->
                    <input type="hidden" name="feedback" id="feedback" value="Tidak ada">
                    <div class="mb-4 mt-4 align-items-center">
                        <button type="submit" class="btn btn-primary">Bagikan Cerita</button>
                    </div>
            </form>
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