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
 <!-- Main content -->
 <div class="main-content" id="panel">

@if(auth()->user()->role==2)
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
@else
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
@endif
 <!-- Header -->
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Topik Diskusi :  {{$topik}}</h6>
              <h3>oleh : <b> {{$forum->user->username}} </b> ({{$forum->created_at}})</h3>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_diskusi">Balas</a>   
            </div> -->
         </div>
        </div>
      </div>
</div>

 <!-- Page content -->
 <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3>ISI PESAN</h3>
              <p>{!!$forum->isi_pesan!!}</p>
              @if($forum->user_id != auth()->user()->id)
              <a href="#" data-toggle="modal" data-target=".create_modal_balas">  <span class="badge badge-pill badge-primary">balas</span></a>  

              @else
              @endif

            </div>
            <div class="card-body">
              <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
              @forelse($forum_jawab as $item) 
              @if($item->user_id == Auth::user()->id )
                <div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-single-02"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="text-muted font-weight-bold">{{$item->created_at}}</small>
                    <h5 class=" mt-3 mb-0">Saya</h5>
                    <p class=" text-sm mt-1 mb-0">{!!$item->isi_pesan!!}</p>
                    <div class="mt-3">
                    <a href="#" data-toggle="modal" data-target=".create_modal_balas">  <span class="badge badge-pill badge-primary">balas</span></a>  
                    <!-- <a href="#" data-toggle="modal" data-target=".create_modal_diskusi">   <span class="badge badge-pill badge-danger">hapus</span> -->
                    </div>
                  </div>
                </div>
                @else
                <div class="timeline-block">
                  <span class="timeline-step badge-danger">
                    <i class="ni ni-single-02"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="text-muted font-weight-bold">{{$item->created_at}}</small>
                    <h5 class=" mt-3 mb-0">{{$item->user->username}}</h5>
                    <p class=" text-sm mt-1 mb-0">{!!$item->isi_pesan!!}</p>
                    <div class="mt-3">
                    <a href="#" data-toggle="modal" data-target=".create_modal_balas">  <span class="badge badge-pill badge-primary">balas</span></a>  

                    </div>
                  </div>
                </div>
                @endif	
                @empty
                Belum ada jawaban
                @endforelse 
              </div>
            </div>
          </div>
        </div>
</div>
@endsection

@section('linkfooter')

<!-- Create Modal (Balasan)-->
<div class="modal fade create_modal_balas"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md-12" >
		<div class="modal-content">
			<div class="modal-header ">
				<h5 class="modal-title " id="exampleModalLabel">Balas Pesan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

        <form action="{{route('storeForumJawab')}}" enctype="multipart/form-data" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="status" value='0'>
        <input type="hidden" name="forum_id" value='{{$forum->id}}'>
			<div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="pesan" class="col-form-label">ISI PESAN</label><br/>
                            <textarea class="form-control" name="isi_pesan" rows="auto" cols="auto" id="isi_pesan"></textarea>

                        </div>
					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-info" >Kirim</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- Penutup Create Diskusi -->
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

<script>
ClassicEditor
            .create( document.querySelector( '#isi_pesan' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endsection
