<!DOCTYPE html>
<html lang="en">

<head>
  <title>Academics &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets_1/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets_1/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets_1/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets_1/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets_1/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets_1/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets_1/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets_1/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('assets_1/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('assets_1/css/aos.css')}}">
  <link href="{{asset('assets_1/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('assets_1/css/style.css')}}">



</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 081 3132 632 64</a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@gmail.com</a> 
          </div>
          <div class="col-lg-3 text-right">
          @if (Route::has('login'))
            @auth
               <a href="{{ url('/home') }}" class="small btn btn-primary px-4 py-2 rounded-0">Dashboard</a>
            @else
            <a href="{{route('login')}}" class="small mr-3"><span class="icon-unlock-alt"></span> Masuk</a>
            @if (Route::has('register'))
            <a href="{{route('register')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Daftar</a>
                        @endif
            @endauth
            @endif
           
            
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html" class="d-block">
              <img src="{{asset('assets_1/images/logo.jpg')}}" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.html" class="nav-link text-left">Beranda</a>
                </li>
                <!-- <li class="has-children">
                  <a href="about.html" class="nav-link text-left">Tentang</a>
                  <ul class="dropdown">
                    <li><a href="teachers.html">Our Teachers</a></li>
                    <li><a href="about.html">Our School</a></li>
                  </ul>
                </li> -->
                <li>
                  <a href="admissions.html" class="nav-link text-left">Tentang</a>
                </li>
                <!-- <li>
                  <a href="courses.html" class="nav-link text-left">Courses</a>
                </li> -->
                <li>
                    <a href="contact.html" class="nav-link text-left">Hubungi Kami</a>
                </li>
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <div class="ml-auto">
          <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
          </div>
         
        </div>
      </div>

    </header>

@yield("content")


<div class="footer">
        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <!-- <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div> -->

  <script src="{{asset('assets_1/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets_1/js/popper.min.js')}}"></script>
  <script src="{{asset('assets_1/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets_1/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets_1/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets_1/js/aos.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets_1/js/jquery.mb.YTPlayer.min.js')}}"></script>




  <script src="{{asset('assets_1/js/main.js')}}"></script>

</body>

</html>
