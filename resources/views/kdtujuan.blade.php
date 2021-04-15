@extends('layouts.master-dashboard-rhs-siswa')
<?php  use App\Siswa;
      use App\Guru;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
    $guru = Guru::where('user_id', Auth::user()->id )->first();
?>

@section('content')
{{-- <style>
    .card{
        background: url('{{asset("images/background_new1.jpeg")}}') ;
    }
    .card-header{
        background: url('{{asset("images/background_new1.jpeg")}}') ;
    }
    /* .card{position:relative;display:flex;flex-direction:column;min-width:0;word-wrap:break-word;border:1px solid rgba(0,0,0,.05);border-radius:.375rem;background-color:#fff; background: url('{{asset("images/background_new1.jpeg")}}');background-clip:border-box}
    .card-header{background-image: url('{{asset("images/background_new1.jpeg")}}');margin-bottom:0;padding:1.25rem 1.5rem;border-bottom:1px solid rgba(0,0,0,.05);background-color:#fff}
    .card-footer{background-image: url('{{asset("images/background_new1.jpeg")}}');padding:1.25rem 1.5rem;border-top:1px solid rgba(0,0,0,.05);background-color:#fff} */
</style> --}}
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
              <h6 class="h2 text-white d-inline-block mb-0">KI & KD</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-12">
          <div class="card-wrapper">
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Tujuan</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <ul class="list-group list-group-flush" data-toggle="checklist">
                 <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-success">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">{!!$kdtujuan->tujuan!!}</h5>
                    </div>
                  </div>
                  </li>
                </ul>
              </div>
            </div>
            </div>
            </div>
            </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card-wrapper">
            <!-- Input groups -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">KOMPETENSI INTI</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
              <ul class="list-group list-group-flush" data-toggle="checklist">
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-success">
                    <div class="checklist-info">
                    @if($kdtujuan->ki != null)
                      <h5 class="checklist-title mb-0">{!!$kdtujuan->ki!!}</h5>
                    @else
                    KOMPETENSI INTI BELUM DI INPUT Guru
                    @endif
                    </div>
                  </div>
                </li>
              </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card-wrapper">
            <!-- Tags -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">KOMPETENSI DASAR</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <ul class="list-group list-group-flush" data-toggle="checklist">
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-success">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">{!!$kdtujuan->kd!!}</h5>
                    </div>
                  </div>
                </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
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
              <h6 class="h2 text-white d-inline-block mb-0">KI & KD</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Page content -->
     <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
            <!-- Custom form validation -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Deskripsi</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <p class="mb-0">
                    Kompetensi Inti dan Kompetensi Dasar merupakan komponen Standar Isi untuk jenjang Pendidikan Dasar dan Menengah. Kompetensi Inti (KI) dan Kompetensi Dasar (KD) secara khusus diatur dalam Permendikbud Nomor 24 Tahun 2016 tentang Pemetaan KI dan KD.
                    </p>
                  </div>
                </div>
                <hr />
                <form class="needs-validation" action="{{route('storeKDTujuan')}}" method="post">
    @csrf
    @if($kdtujuan == null)
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="form-control-label" for="validationCustom01">Kompetensi Inti</label>
                      <textarea class="form-control" name="ki" rows="auto" cols="auto" id="ki"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="form-control-label" for="validationCustom01">Kompetensi Dasar</label>
                      <textarea class="form-control" name="kd" rows="auto" cols="auto" id="kd"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="form-control-label" for="validationCustom01">Tujuan</label>
                      <textarea class="form-control" name="tujuan" rows="auto" cols="auto" id="tujuan"></textarea>
                    </div>
                  </div>

                  @else
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="form-control-label" for="validationCustom01">Kompetensi Inti</label>
                      <textarea class="form-control" name="ki" rows="auto" cols="auto" id="ki">{!!$kdtujuan->ki!!}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="form-control-label" for="validationCustom01">Kompetensi Dasar</label>
                      <textarea class="form-control" name="kd" rows="auto" cols="auto" id="kd">{!!$kdtujuan->kd!!}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="form-control-label" for="validationCustom01">Tujuan</label>
                      <textarea class="form-control" name="tujuan" rows="auto" cols="auto" id="tujuan">{!!$kdtujuan->tujuan!!}</textarea>
                    </div>
                  </div>
                  @endif
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>

  </div>
  @endif
@endsection

@section('linkfooter')
<script>
    $(document).ready(function () {
        $(".card").css('background-image','{{URL::asset('/images/background_new1.jpeg')}}')
        // alert("ok");
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
            .create( document.querySelector( '#ki' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#kd' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#tujuan' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@stop
