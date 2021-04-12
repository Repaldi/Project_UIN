@extends('layouts.master-front-end')
@section('content')

<!-- Navabr -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="pages/dashboards/dashboard.html">
        <img src="{{asset('assets_rhs_1/img/brand/putih.png')}}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="pages/dashboards/dashboard.html">
                <img src="{{asset('assets_rhs_1/img/brand/biru.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{(request()->is('/')) ? 'active' : ''}}">
            <a href="{{route('index')}}" class="nav-link">
              <span class="nav-link-inner--text">Beranda</span>
            </a>
          </li>
          <li class="nav-item {{(request()->is('#tentang-aplikasi')) ? 'active' : ''}}">
            <a href="#tentang-aplikasi"  class="nav-link">
              <span class="nav-link-inner--text">Tentang</span>
            </a>
          </li>
          <li class="nav-item {{(request()->is('#hubungi-kami')) ? 'active' : ''}}">
            <a href="#hubungi-kami" class="nav-link">
              <span class="nav-link-inner--text">Hubungi Kami</span>
            </a>
          </li>
          @if (Route::has('login'))
            @auth
            <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">
              <span class="nav-link-inner--text">Dashboard</span>
            </a>
            </li>
            <hr class="d-lg-none" />
            <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <span class="nav-link-inner--text">Keluar</span>
            </a>
            </li>
            @else
            <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">
              <span class="nav-link-inner--text">Masuk</span>
            </a>
          </li>

            @if (Route::has('register'))
            <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <span class="nav-link-inner--text">Daftar</span>
            </a>
          </li>
                        @endif
            @endauth
            @endif
         
         
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-primary pt-5 pb-7">
      <div class="container">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="pr-5">
                <h1 class="display-2 text-white font-weight-bold mb-0">Selamat Datang</h1>
                <h2 class="display-4 text-white font-weight-light">di Media Pembelajaran Fisika</h2>
                <p class="text-white mt-4">Media Pembalajaran ini di buat untuk siswa kelas 10 SMA</p>
                <div class="mt-5">
                  <a href="{{route('login')}}" class="btn btn-neutral my-2">Masuk</a>
                  <a href="{{route('register')}}" class="btn btn-default my-2">Daftar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row pt-5">
                <div class="col-md-12">
                <center> <img src="{{asset('assets_rhs_1/img/theme/landing_rhs.png')}}" class="img-fluid">
  </center>    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <section class="py-6 pb-9 bg-default">
      <div class="row justify-content-center text-center">
        <div class="col-md-6">
          <h2 class="display-3 text-white" id="tentang-aplikasi">Tentang Aplikasi</h3>
            <p class="lead text-white">
            Aplikasi ini merupakan media pembelajaran fisika berbasis web pada pokok bahasan momentum dan impuls untuk siswa sekolah menengah atas negeri 3 Sungai Penuh. 
            </p>
        </div>
      </div>
    </section>
    <section class="section section-lg pt-lg-0 mt--7">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape bg-gradient-primary text-white rounded-circle mb-4">
                      <i class="ni ni-check-bold"></i>
                    </div>
                    <h4 class="h3 text-primary text-uppercase">Mudah Digunakan</h4>
                    <p class="description mt-3">Aplikasi ini memudahkan siswa dan guru dalam melakukan proses belajar mengajar</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle mb-4">
                      <i class="ni ni-books"></i>
                    </div>
                    <h4 class="h3 text-success text-uppercase">Tersedia Quiz</h4>
                    <p class="description mt-3">Dari setiap materi yang dibuat oleh guru, siswa dapat mengerjakan quiz yang tersedia</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape bg-gradient-warning text-white rounded-circle mb-4">
                      <i class="ni ni-book-bookmark"></i>
                    </div>
                    <h4 class="h3 text-warning text-uppercase">Tersedia E-Book</h4>
                    <p class="description mt-3">Siswa juga dapat mendownload E-book yang tersedia, guna mendukung proses belajar.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6">
      <div class="container">
        <div class="row row-grid align-items-center">
          <div class="col-md-6 order-md-2">
           <center> <img src="{{asset('assets_rhs_1/img/theme/sundari.jpeg')}}"  width="50%"class="img-fluid">
  </center>          
          </div>
          <div class="col-md-6 order-md-1">
            <div class="pr-md-5">
              <h1>Profil Pengembang Aplikasi</h1>
              <p>Halo, Saya Sundari Fadhila, Lahir di Kerinci pada Tanggal 01 Oktober 1999, Saya berasal dari Desa Permai Indah, Kec.Koto Baru, Kota Sungai Penuh, Provinsi Jambi. Saat ini saya menempuh pendidikan tinggi di Universitas Islam Negeri Jambi.</p>
            Kontak :
              <ul class="list-unstyled mt-3">
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-email-83"></i>
                      </div>
                    </div>
                    <div>
                      <h4 class="mb-0" id="hubungi-kami">sundarifadhila36@gmail.com</h4>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-mobile-button"></i>
                      </div>
                    </div>
                    <div>
                      <h4 class="mb-0">+62 813-6627-3919</h4>
                    </div>
                  </div>
                </li>
                <li class="py-2">
                  <div class="d-flex align-items-center">
                    <div>
                      <div class="badge badge-circle badge-success mr-3">
                        <i class="ni ni-pin-3"></i>
                      </div>
                    </div>
                    <div>
                      <h4 class="mb-0">Jl. Kemajuan
Mendalo Darat, Kec. Jambi Luar Kota, Kabupaten Muaro Jambi, Jambi 36361
</h4>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection