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
              <h6 class="h2 text-white d-inline-block mb-0">Forum Diskusi</h6>
            </div>

			<div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_diskusi">Mulai Diskusi Baru</a>
                </div>

         </div>
        </div>
      </div>
</div>

 <!-- Page content -->
 <div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Riwayat Diskusi</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="topik">Topik</th>
                    <th scope="col" class="sort" data-sort="topik">Penulis</th>
                    <th scope="col" class="sort" data-sort="topik">Tanggal</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($forum as $item)
                  <tr>
                    <td class="no">
                    {{$loop->iteration}}
                    </td>
                    <td class="topik">
					{{$item->topik}}
                    </td>
                    <td class="penulis">
					{{$item->user->username}}
                    </td>
                    <td class="tanggal">
					{{$item->created_at}}
                    </td>

          @if($item->user_id == auth()->user()->id)         
           <td >
					<a href="{{route('showForum',$item->id)}}" class="btn btn-sm btn-info">Buka</a>
					<a href="{{route('deleteForum',$item->id)}}" class="btn  btn-sm btn-danger">Hapus</a>
          </td>
					@else
          <td >
					<a href="{{route('showForum',$item->id)}}" class="btn btn-sm btn-info">Buka</a>
          </td>
					@endif
                    
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

</div>
@endsection

@section('linkfooter')

<!-- Create Modal (Diskusi)-->
<div class="modal fade create_modal_diskusi"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md-12" >
		<div class="modal-content">
			<div class="modal-header ">
				<h5 class="modal-title " id="exampleModalLabel"> Buat Forum Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<form action="{{route('storeForum')}}" enctype="multipart/form-data" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="status" value='0'>
			<div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="Topik" class="col-form-label">Topik Forum</label><br/>
							<input type="text" class="form-control" name="topik" id="topik"></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="isi_pesan" class="col-form-label">Isi Pesan</label> <br/>
							<textarea class="form-control ckeditor" name="isi_pesan" rows="auto" cols="auto" id="isi_pesan"></textarea>
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
