<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Media Pembelajaran Fisika</title>
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets_rhs_1/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets_rhs_1/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets_rhs_1/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets_rhs_1/css/argon.min-v=1.0.0.css')}}" type="text/css">

</head>

<body>
  @yield('content')

   <!-- Footer -->
   <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('assets_rhs_1/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/lavalamp/js/jquery.lavalamp.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets_rhs_1/vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets_rhs_1/js/argon.min-v=1.0.0.js')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('assets_rhs_1/js/demo.min.js')}}"></script>
</body>

</html>
