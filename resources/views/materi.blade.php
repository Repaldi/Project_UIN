@extends('layouts.master-dashboard-rhs-siswa')
<?php  use App\Siswa;
      use App\Guru;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
    $guru = Guru::where('user_id', Auth::user()->id )->first();
?>

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(auth()->user()->role==2)
<!-- Main content -->
 <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                @if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('images/' . $siswa->foto) }}" width="20%">
                  </span>
                @else
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets_rhs_1/img/theme/react.jpg')}}">
                  </span>
                @endif

                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->username}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">{{auth()->user()->username}}</h6>
                </div>
                <a href="{{route('profilSiswa')}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profilku</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Keluar</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Materi</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div class="card" style="background-image: url('assets_rhs_1/img/theme/ok.jpeg')">
            @if($materi->materi != null)
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">{{$materi->judul_materi}}</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
              <div class="text-center">
                <img src="{{url('asset-materi/'.$materi->gambar)}}" alt="" style="width: 70%; height: auto;">
              </div>
              <div class="text-justify" style="padding:20px;">
                <p>{!!$materi->materi!!}</p>
              </div>
            
            @if($materi->video != null)
             <div class="text-center">
              <iframe src="{{url('asset-materi/'.$materi->video)}}" width="70%" height="500px"></iframe>
            </div>
            @else
            @endif
            @else
            <div class="card-header">
                <h3 class="mb-0">{{$materi->judul_materi}}</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
              <div class="text-center">
                Materi Belum Tersedia
              </div>
              
            @endif
            <a href="#" class="btn btn-primary navbar-btn-right" id="quiz">Quiz</a>
              </div>
            </div>
          </div>
    </div>
@else
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                @if ( Guru::where('user_id', Auth::user()->id )->first() != null )
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('images/' . $guru->foto) }}" width="20%">
                  </span>
                @else
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets_rhs_1/img/theme/react.jpg')}}">
                  </span>
                @endif

                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->username}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">{{auth()->user()->username}}</h6>
                </div>
                <a href="{{route('profilGuru')}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profilku</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Keluar</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Edit Materi</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
     <!-- File browser -->
     @if($materi == null)
      <form action="{{route('storeMateri')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card" style="background-image: url('assets_rhs_1/img/theme/bg.png')">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Judul</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
              <input type="text" class="form-control" name="judul_materi" value="{{$materi->judul_materi}}">
              </div>
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Piih Video</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input"  name="video" lang="en">
                    <label class="custom-file-label" for="customFileLang">Piih File</label>
                  </div>
              </div>
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">ISI MATERI</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <textarea class="form-control ckeditor" name="materi" rows="auto" cols="auto" id="materi" rows="10" required>{{old('materi')}}</textarea>
              </div>
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col-lg-10">
          <button type="submit" name="button" class="btn btn-primary"> <i class="lnr lnr-upload"></i>Simpan</button>
        </div>
      </div>
      </form>
    @else
      <form action="{{route('updateMateri')}}" method="post" enctype="multipart/form-data">
      @csrf @method('PATCH')
      <input type="hidden" name="materi_id" value="{{$materi->id}}">
      <div class="card" >
              <!-- Card header -->
              <div class="card-header" >
                <h3 class="mb-0">Judul</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
              <input type="text" class="form-control" name="judul_materi" value="{{$materi->judul_materi}}">
              </div>
            
              @if($materi->video == null)
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Piih Video</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" name="video"  lang="en">
                    <label class="custom-file-label" for="customFileLang">Piih File</label>
                  </div>
              </div>
              @else
               <!-- Card header -->
               <div class="card-header">
                <h3 class="mb-0">Ganti Video </h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <div class="custom-file">
                    <iframe src="{{url('asset-materi/'.$materi->video)}}" width="30%" height="200px"></iframe><br/>
                  </div>
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" name="video" value="{{url('asset-materi'.$materi->video)}}" lang="en">
                    <label class="custom-file-label" for="customFileLang">Piih File</label>
                    </div>
              </div>
              @endif
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">ISI MATERI</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <textarea class="form-control ckeditor" name="materi" rows="auto" cols="auto" id="materi" rows="10" required>{{$materi->materi}}</textarea>
              </div>
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col-lg-10">
          <button type="submit" name="button" class="btn btn-primary"> <i class="lnr lnr-upload"></i>Simpan</button>
        </div>
      </div>
      </form>
      @endif
      <a href="{{route('getQuiz')}}" class="btn btn-primary navbar-btn-left" style="width: 105px; margin-top: 10px;">Quiz</a>
    </div>
  </div>
@endif

@endsection

@section('linkfooter')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('success'))
<script>
    swal({
        title: "Good job!",
        text: "Berhasil Mengubah Materi",
        icon: "success",
        button: "OK",
    });
</script>

@endif


<script>
  $(document).ready(function () {
    $("#quiz").click(function (e) {
      swal({
        title: "Yakin?",
        text: "Mau memulai quiz ?",
        icon: "warning",
        buttons: true,
        dangerMode: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/create-quiz";
        }
      });
    });

  });
</script>
@endsection
