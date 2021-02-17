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
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{asset('assets_1/images/logoku.jpg')}}" alt="PhysicEdu" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
			
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets_2/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->username }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{route('profilAdmin')}}"><i class="lnr lnr-user"></i> <span>Profil Saya</span></a></li>
								
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
						<li><a href="{{route('profilAdmin')}}" class="{{(request()->is('admin/profil')) ? 'active' : ''}}"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed {{(request()->is('admin/data-guru')) ? 'active' : ''}} {{(request()->is('admin/data-siswa')) ? 'active' : ''}}"><i class="lnr lnr-users"></i> <span>Data Pengguna</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{route('dataGuru')}}" class="{{(request()->is('admin/data-guru')) ? 'active' : ''}}">Guru</a></li>
									<li><a href="{{route('dataSiswa')}}" class="{{(request()->is('admin/data-siswa')) ? 'active' : ''}}">Siswa</a></li>
								</ul>
							</div>
						</li>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
	@yield('content')
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('assets_2/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('assets_2/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('assets_2/scripts/klorofil-common.js')}}"></script>
	
</body>

</html>
