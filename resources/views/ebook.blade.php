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
              <h6 class="h2 text-white d-inline-block mb-0">E-book</h6>
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
              <h3 class="mb-0">Daftar E-Book</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive" data-toggle="list" data-list-values='["no", "judul", "penulis","tahun"]'>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="judul">Judul </th>
                    <th scope="col" class="sort" data-sort="penulis">Penulis</th>
                    <th scope="col" class="sort" data-sort="tahun">Tahun</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @forelse ($ebook as $item)
                  <tr>
                    <td class="budget">
                    {{$loop->iteration}}
                    </td>
                    <td class="budget">
                    {{$item->judul}}
                    </td>
                    <td class="budget">
                      {{$item->penulis}}
                    </td>
                    <td class="budget">
                    {{$item->tahun}}
                    </td>
                    <td class="budget">
                    <a href="{{url('asset-ebook/'.$item->file)}}" class="btn btn-primary" target="__blank"> <i class="lnr lnr-download"></i> Download</a>
                    </td>
                  </tr>  
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
              {{$ebook->links()}}
              </nav>
            </div>
            @empty
            <tr>
          <td>E-Book Tidak Tersedia</td>
          </tr>
        @endforelse
          </div>
        </div>
      </div>
    </div>
    </div>
@elseif(auth()->user()->role==1)
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
              <h6 class="h2 text-white d-inline-block mb-0">E-Book</h6>
            </div>    
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#tambah_ebook">Tambah E-Book</a>
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
              <h3 class="mb-0">Daftar E-Book</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive" data-toggle="list" data-list-values='["no", "judul", "penulis","tahun"]'>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="judul">Judul </th>
                    <th scope="col" class="sort" data-sort="penulis">Penulis</th>
                    <th scope="col" class="sort" data-sort="tahun">Tahun</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>
                  @forelse($ebook as $item)
                    <td class="no">
                    {{$loop->iteration}}
                    </td>
                    <td class="judul">
                    {{$item->judul}}
                    </td>
                    <td class="penulis">
                    {{$item->penulis}}
                    </td>
                    <td class="tahun">
                    {{$item->tahun}}
                    </td>
                    
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="sortable.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item"  href="{{url('asset-ebook/'.$item->file)}}" class="btn btn-primary" target="__blank"> <i class="lnr lnr-download"></i> Download</a>
                        <a class="dropdown-item"  href="#" class="btn btn-warning edit-ebook" data-ebook_id="{{$item->id}}" data-judul="{{$item->judul}}" data-penulis="{{$item->penulis}}" data-tahun="{{$item->tahun}}" data-toggle="modal" data-target="#edit_ebook"> <i class="lnr lnr-edit"></i> Edit </a>
                        <a class="dropdown-item"  href="#" class="btn btn-danger hapus-ebook" data-ebook_id="{{$item->id}}" data-judul="{{$item->judul}}">Hapus</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
              <nav aria-label="...">
              {{$ebook->links()}}
              </nav>
            </div>
            @empty
            <tr>
          <td>E-Book Tidak Tersedia</td>
          </tr>
        @endforelse
          </div>
        </div>
      </div>
    </div>
    </div>
@else
@endif

<script>
    $(document).ready(function () {
        $(".edit-ebook").click(function (e) {
        const judul      = $(this).data('judul')
        const ebook_id         = $(this).data('ebook_id');
        const penulis       = $(this).data('penulis');
        const tahun           = $(this).data('tahun');

        console.log(judul);
        console.log(ebook_id);
        console.log(penulis);
        console.log(tahun);
        $("#ebook_id_update").val(ebook_id);
        $("#penulis_update").val(penulis);
        $("#judul_update").val(judul);
        $("#tahun_update").val(tahun);

        });
    });

    $('.hapus-ebook').click(function(){
			const ebook_id = $(this).data('ebook_id');
			const judul = $(this).data('judul');

            swal({
                title: "Hapus?",
                text: "Yakin mau menghapus E-Book "+ judul + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = '/guru/e-book/delete/'+ebook_id;
                }
            });

		});

</script>

@endsection

@section('linkfooter')
<!-- Modal TAMBAH EBOOK -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="tambah_ebook">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Ebook</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('storeEbook')}}" enctype="multipart/form-data" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
              <div class="container">
                  <div class="col-lg">
                    <div class="form-group">
                      <label for="judul" class="col-form-label">Judul Ebook</label>
                      <input class="form-control" type="text" name="judul" id="judul">
                    </div>
                    <div class="form-group">
                      <label for="penulis" class="col-form-label">Penulis</label>
                      <input class="form-control" type="text" name="penulis" id="penulis">
                    </div>
              
                  <div class="form-group">
                        <label for="tahun" class="col-form-label">Tahun </label>
                        <input class="form-control" name="tahun" id="tahun" type="number">
                  </div>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="file" id="file">
                      <label class="custom-file-label" for="projectCoverUploads">Pilih File E-Book</label>
                  </div>
              </div>
            </div>


          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-info" >Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>

 <!-- Modal EDIT EBOOK -->
 <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_ebook">
    <div class="modal-dialog modal-md-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Edit Ebook</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updateEbook')}}" enctype="multipart/form-data" method="post">
          @csrf @method('PATCH')
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="judul" class="col-form-label">Judul Ebook</label>
                      <input type="hidden" value="" name="ebook_id_update" id="ebook_id_update">
                      <input class="form-control" type="text" name="judul_update" id="judul_update" value="">
                    </div>
                    <div class="form-group">
                      <label for="penulis" class="col-form-label">Penulis</label>
                      <input class="form-control" type="text" name="penulis_update" id="penulis_update" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="tahun" class="col-form-label">Tahun </label>
                        <input class="form-control" name="tahun_update" id="tahun_update" type="number" value="">
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-form-label">File </label>
                        <input type="file" name="file_update" class="form-control" id="file_update">
                    </div>
                  </div>
              </div>
            </div>


          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-info" >Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>

@if(Session::has('success-edit'))
<script>
    swal({
        title: "Berhasil",
        text: "Berhasil mengedit E-Book",
        icon: "success",
        button: "OK",
    });
</script>
@endif


@endsection