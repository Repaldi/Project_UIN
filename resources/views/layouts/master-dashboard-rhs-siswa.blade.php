
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="{{asset('assets_rhs_1/css/argon.min-v=1.0.0.css')}}" type="text/css">
  <script src="{{asset('assets_rhs_1/vendor/jquery/dist/jquery.min.js')}}"></script>

</head>
<?php  use App\Siswa;
      use App\Guru;
      use App\KDTujuan;
    $kdtujuan = KDTujuan::first();
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
    $guru = Guru::where('user_id', Auth::user()->id )->first();
?>
<body>
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="dashboard.html">
          <img src="{{asset('assets_rhs_1/img/brand/biru.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      @if(auth()->user()->role==2)
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="{{(request()->is('home')) ? 'active' : ''}} nav-link" href="{{route('home')}}">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('siswa/profil')) ? 'active' : ''}} nav-link" href="{{route('profilSiswa')}}">
                <i class="ni ni-circle-08 text-info"></i>
                <span class="nav-link-text">Profil</span>
              </a>
            </li>
            @if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
            @if($kdtujuan !== null)
            <li class="nav-item">
              <a class="{{(request()->is('kd&tujuan')) ? 'active' : ''}} nav-link" href="{{route('kdTujuan')}}">
                <i class="ni ni-tag text-red"></i>
                <span class="nav-link-text">KI & KD</span>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="{{(request()->is('kd&tujuan')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-tag text-red"></i>
                <span class="nav-link-text">KI & KD</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="{{(request()->is('materi*')) ? 'active' : ''}} nav-link" href="{{route('materi')}}">
                <i class="ni ni-books text-pink"></i>
                <span class="nav-link-text">Materi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('quiz*')) ? 'active' : ''}} nav-link" href="{{route('createQuiz')}}">
                <i class="ni ni-laptop text-info"></i>
                <span class="nav-link-text">Quiz</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('e-book*')) ? 'active' : ''}} nav-link" href="{{route('getEbook')}}">
                <i class="ni ni-book-bookmark text-red"></i>
                <span class="nav-link-text">E-Book</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('latihan*')) ? 'active' : ''}} nav-link" href="{{route('getLatihan')}}">
                <i class="ni ni-align-center text-pink"></i>
                <span class="nav-link-text">Latihan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('forum*')) ? 'active' : ''}} nav-link" href="{{route('forum')}}">
                <i class="ni ni-chat-round text-green"></i>
                <span class="nav-link-text">Diskusi</span>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="{{(request()->is('kd&tujuan')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-tag text-red"></i>
                <span class="nav-link-text">KI & KD</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('materi*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-books text-pink"></i>
                <span class="nav-link-text">Materi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('quiz*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-laptop text-info"></i>
                <span class="nav-link-text">Quiz</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('e-book*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-book-bookmark text-red"></i>
                <span class="nav-link-text">E-Book</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('latihan*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-align-center text-pink"></i>
                <span class="nav-link-text">Latihan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('forum*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-chat-round text-green"></i>
                <span class="nav-link-text">Diskusi</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </div>
      @else
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="{{(request()->is('home')) ? 'active' : ''}} nav-link" href="{{route('home')}}">
                <i class="ni ni-archive-2 text-green"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('guru/profil')) ? 'active' : ''}} nav-link" href="{{route('profilGuru')}}">
                <i class="ni ni-circle-08 text-info"></i>
                <span class="nav-link-text">Profil</span>
              </a>
            </li>
            @if ( Guru::where('user_id', Auth::user()->id )->first() != null )
            <li class="nav-item">
              <a class="{{(request()->is('kd&tujuan')) ? 'active' : ''}} nav-link" href="{{route('kdTujuan')}}">
                <i class="ni ni-tag text-red"></i>
                <span class="nav-link-text">KI & KD</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('materi*')) ? 'active' : ''}} nav-link" href="{{route('materi')}}">
                <i class="ni ni-books text-pink"></i>
                <span class="nav-link-text">Materi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('quiz*')) ? 'active' : ''}} nav-link" href="{{route('getQuiz')}}">
                <i class="ni ni-laptop text-info"></i>
                <span class="nav-link-text">Quiz</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('e-book*')) ? 'active' : ''}} nav-link" href="{{route('getEbook')}}">
                <i class="ni ni-book-bookmark text-red"></i>
                <span class="nav-link-text">E-Book</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('latihan*')) ? 'active' : ''}} nav-link" href="{{route('getLatihan')}}">
                <i class="ni ni-align-center text-pink"></i>
                <span class="nav-link-text">Latihan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('forum*')) ? 'active' : ''}} nav-link" href="{{route('forum')}}">
                <i class="ni ni-chat-round text-green"></i>
                <span class="nav-link-text">Diskusi</span>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="{{(request()->is('kd&tujuan')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-tag text-red"></i>
                <span class="nav-link-text">KI & KD</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('materi*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-books text-pink"></i>
                <span class="nav-link-text">Materi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('quiz*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-laptop text-info"></i>
                <span class="nav-link-text">Quiz</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('e-book*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-book-bookmark text-red"></i>
                <span class="nav-link-text">E-Book</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('latihan*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-align-center text-pink"></i>
                <span class="nav-link-text">Latihan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="{{(request()->is('forum*')) ? 'active' : ''}} nav-link" href="#">
                <i class="ni ni-chat-round text-green"></i>
                <span class="nav-link-text">Diskusi</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </div>
      @endif
    </div>
  </nav>

  @yield('content')

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->

  <script src="{{asset('assets_rhs_1/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/lavalamp/js/jquery.lavalamp.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets_rhs_1/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/quill/dist/quill.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script src="{{asset('assets_rhs_1/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets_rhs_1/js/argon.min-v=1.0.0.js')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('assets_rhs_1/js/demo.min.js')}}"></script>
  @yield('linkfooter')




</body>

</html>
