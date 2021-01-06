<!doctype html>
<html lang="en">

<head>
	<title>@yield('title')</title>
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
				<a href="index.html"><img src="{{asset('assets_2/img/logo-dark.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Cari ...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Cari</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets_2/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->username }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
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
						<li><a href="{{route('profilGuru')}}" class="{{(request()->is('/profil')) ? 'active' : ''}}"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
						<li><a href="{{route('petunjuk')}}" class=""><i class="lnr lnr-cog"></i> <span>Petunjuk</span></a></li>
						<li><a href="{{route('kdTujuan')}}" class=""><i class="lnr lnr-bookmark"></i> <span>KD & Tujuan</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-book"></i> <span>Materi</span></a></li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Latihan</span></a></li>
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
		<div class="clearfix">
		</div>
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
	<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
	@yield('linkfooter')
</body>

</html>
