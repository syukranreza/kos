@php
    $konf = DB::table('setting')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $konf->instansi_setting }}</title>
    <link rel="icon" href="{{ asset('logo/'.$konf->favicon_setting) }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('web/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/fl-bigmug-line.css') }}">
    
  
    <link rel="stylesheet" href="{{ asset('web/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    
  </head>
  <body>

  
    
  
  <div class="site-wrap">

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="{{ url('/') }}" class="text-white h2 mb-0"><img src="{{ asset('logo/'.$konf->logo_setting) }}" alt="" style="width: 80px;"></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li><a href="{{ url('data_kamar') }}">Kamar</a></li>
                  @if (Auth::check())
                      @if (Auth::user()->role == 'Admin')
                          <li><a href="{{ url('dashboard.index') }}">Dashboard</a></li>
                      @else
                      <li><a href="{{ route('pemesanan.index') }}">Data Reservasi Saya</a></li>
                      @endif
                  <li> <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();" class="rounded-0 py-4 px-lg-5">Logout</a>
                </form></li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                  @endif
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    @yield('isi')

    <footer class="site-footer bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">{{ $konf->instansi_setting }}</h3>
                {{ $konf->tentang_setting }}
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>

            Copyright &copy; <?php $dt = date('Y'); echo $dt; ?> All rights reserved | This web is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="{{ url('/') }}" target="_blank" >{{ $konf->instansi_setting }}</a>

            </p>
          </div>
          
        </div>
      </div>
    </footer>

  </div>

  <script src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('web/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('web/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('web/js/popper.min.js') }}"></script>
  <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('web/js/mediaelement-and-player.min.js') }}"></script>
  <script src="{{ asset('web/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('web/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('web/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('web/js/aos.js') }}"></script>
  <script src="{{ asset('web/js/circleaudioplayer.js') }}"></script>

  <script src="{{ asset('web/js/main.js') }}"></script>
    
  </body>
</html>