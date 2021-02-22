<!doctype html>
<html lang="en">

<head>
<title>Dashboard | Pyhsic Edu</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets_2/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_2/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_2/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets_2/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets_2/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets_2/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets_2/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets_2/img/favicon.png')}}">
    <script src="{{asset('assets_2/vendor/jquery/jquery-3.5.1.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

</head>
<?php  use App\Siswa;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
?>


<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{asset('assets_2/img/logoku.jpg')}}" alt="PhysicEdu" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						@if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ url('images/' . $siswa->foto) }}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->username }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						@else
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets_2/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->username }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>

						@endif
							<ul class="dropdown-menu">
								<li><a href="{{route('profilSiswa')}}"><i class="lnr lnr-user"></i> <span>Profil Saya</span></a></li>
								<li><a href="{{ route('logout') }}"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{route('home')}}" class="{{(request()->is('home')) ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{route('profilSiswa')}}" class="{{(request()->is('/profil')) ? 'active' : ''}}"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
						{{-- <li><a href="{{route('petunjuk')}}" class="{{(request()->is('petunjuk*')) ? 'active' : ''}}"><i class="lnr lnr-cog"></i> <span>Petunjuk</span></a></li> --}}
						<li><a href="{{route('kdTujuan')}}" class="{{(request()->is('kd&tujuan*')) ? 'active' : ''}}"><i class="lnr lnr-bookmark"></i> <span>KI & KD</span></a></li>
						<li><a href="{{route('materi')}}" class="{{(request()->is('materi*')) ? 'active' : ''}}"><i class="lnr lnr-list"></i> <span>Materi</span></a></li>
						<li><a href="{{route('createQuiz')}}" class="{{(request()->is('quiz*')) ? 'active' : ''}}"><i class="lnr lnr-pushpin"></i> <span>Quiz</span></a></li>
                        <li><a href="{{route('getEbook')}}" class="{{(request()->is('e-book*')) ? 'active' : ''}}"><i class="lnr lnr-book"></i> <span>E-Book</span></a></li>
						<li><a href="{{route('getLatihan')}}" class="{{(request()->is('latihan*')) ? 'active' : ''}}"><i class="lnr lnr-paperclip"></i> <span>Latihan</span></a></li>
						<li><a href="{{route('forum')}}" class="{{(request()->is('forum*')) ? 'active' : ''}}"><i class="lnr lnr-bubble"></i> <span>Diskusi</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<div class="main">
		  <div class="main-content">
		    <div class="row">
		      <div class="col-md-12">
				@yield('content')
			  </div>
			</div>
		   </div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}
	<script src="{{asset('assets_2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('assets_2/scripts/klorofil-common.js')}}"></script>
	<script>

//   $(document).ready(function () {
//     $("#latihan").click(function (e) {
//       swal({
//         title: "Yakin?",
//         text: "Mau memulai Latihan ?",
//         icon: "warning",
//         buttons: true,
//         dangerMode: false,
//       })
//       .then((willDelete) => {
//         if (willDelete) {
//           window.location = "/create-latihan";
//         }
//       });
//     });

//   });
</script>
	@yield('linkfooter')


</body>

</html>
