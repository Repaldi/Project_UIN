@extends('layouts.master-dashboard-rhs-siswa')
<?php
use App\Siswa;
use App\Guru;
use App\Pilgan;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
    $guru = Guru::where('user_id', Auth::user()->id )->first();
    $pilgan = Pilgan::where('isdelete',false)->get();

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
              <h6 class="h2 text-white d-inline-block mb-0">Latihan</h6>
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
              <h3 class="mb-0">Daftar Latihan</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="nama_latihan">Nama Latihan</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                @if($latihan_siswa->count() != 0)
                @foreach($latihan_siswa as $item)
                  <tr>
                    <td class="no">
                    {{$loop->iteration}}
                    </td>
                    <td class="nama_latihan">
                    {{$item->latihan->nama_latihan}}
                    </td>
                    <td class="status">
                    @if ($item->status == false)
                            Belum dikerjakan
                        @else
                            Telah dikerjakan
                        @endif
                    </td>
                    <td >
                        @if ($item->status == false)
                        <a href="{{route('getLatihanSiswa',$item->id)}}" class="btn btn-sm btn-info">Buka</a>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                <td>Kamu Belum mengikuti Latihan manapun</td>
                </tr>
                @endif

                </tbody>
              </table>
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
              <h6 class="h2 text-white d-inline-block mb-0">Latihan</h6>
            </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#buat_latihan">Buat Latihan Baru</a>
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
              <h3 class="mb-0">Daftar Latihan</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="judul">Nama Latihan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody">

                @if($latihan->count() != 0)
                @foreach($latihan as $item)
                  <tr>
                    <td>
                    {{$loop->iteration}}
                    </td>
                    <td>
                    {{$item->nama_latihan}}
                    </td>
                    <td>
                        <a href="{{route('getLatihanSiswaPerLatihan',$item->id)}}" class="btn btn-sm btn-info" target="_self">Lihat Hasil</a>
                        <a href="#" class="btn btn-sm btn-danger hapus-latihan" data-latihan_id="{{$item->id}}">Hapus</a>
                    </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
              </table>
            </div>

          </div>
            <!-- Card header -->
                <div class="card-header">
                 <h3 class="mb-0">Buat Soal Latihan <a href="#" class="btn btn-sm btn-primary" style="color:black;float:right;"data-toggle="modal" data-target=".create_modal_pilgan"> Tambah Soal</a></h3>
                </div>
              <!-- Card body -->
                <div class="card-body">
                <div class="row">
                <?php $i = 1; ?>
                        @foreach ($pilgan as $item)
                        <div class="col-md-3">
                                <div class="card">
                                         <div class="card-body">
                                        <h6><strong>Soal No. <?php echo $i; $i++ ; ?></strong> <span style="float:right;">Poin : {!!$item->poin!!}</span></h6> <hr class="mt-1 mb-1">
                                        <p class="mb-2">Kunci Jawaban : {!!$item->kunci!!}</p>
                        <div class="text-right">
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target=".update_modal_pilgan"
                        id="updatePilgan"
                        data-pilgan_id_update="{!! $item->id !!}"
                        data-poin_update="{!! $item->poin !!}"
                        data-pertanyaan_update="{!! $item->pertanyaan !!}"
                        data-pil_a_update="{!! $item->pil_a !!}"
                        data-pil_b_update="{!! $item->pil_b !!}"
                        data-pil_c_update="{!! $item->pil_c !!}"
                        data-pil_d_update="{!! $item->pil_d !!}"
                        data-pil_e_update="{!! $item->pil_e !!}"
                        data-foto_update="{!! $item->foto !!}"
                        data-kunci_update="{!! $item->kunci !!}">
                        Edit Soal</button>
                       
                        </div>
                        <div class="text-right" style="padding-top :5px">
                        <a href="#" class="btn btn-sm btn-danger hapus-soal-latihan" pilgan_id="{{$item->id}}">Hapus Soal</a>
            </div>
            </div>
           </div>
        </div>
    @endforeach

        </div>
                </div>
        </div>
      </div>
    </div>
    </div>
@endif


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click','#updatePilgan', function(){
        var pilgan_id_update            = $(this).data('pilgan_id_update');
        var poin_update                 = $(this).data('poin_update');
        var pertanyaan_update           = $(this).data('pertanyaan_update');
        var pil_a_update                = $(this).data('pil_a_update');
        var pil_b_update                = $(this).data('pil_b_update');
        var pil_c_update                = $(this).data('pil_c_update');
        var pil_d_update                = $(this).data('pil_d_update');
        var pil_e_update                = $(this).data('pil_e_update');
        var foto_update                 = $(this).data('foto_update');
        var kunci_update                = $(this).data('kunci_update');
        $('#pilgan_id_update ').val(pilgan_id_update);
        $('#poin_update ').val(poin_update);
        $('#pertanyaan_update').val(pertanyaan_update);
        $('#pil_a_update').val(pil_a_update);
        $('#pil_b_update').val(pil_b_update);
        $('#pil_c_update').val(pil_c_update);
        $('#pil_d_update').val(pil_d_update);
        $('#pil_e_update').val(pil_e_update);
        $('#foto_update').attr("src", "{{url('images/soal')}}"+"/"+foto_update);
        $('#kunci_update').val(kunci_update);
    });

});
</script>

@endsection
@section('linkfooter')

<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="buat_latihan">
    <div class="modal-dialog modal-md-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Buat Latihan Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('storeLatihan')}}" enctype="multipart/form-data" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul" class="col-form-label">Nama Latihan</label>
                    <input class="form-control" type="text" name="nama_latihan" placeholder="Contoh: Latihan 1">
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success-create'))
<script>
    swal({
        title: "Berhasil",
        text: "Berhasil membuat latihan baru",
        icon: "success",
        button: "OK",
    });
</script>
@endif

<script>
    $('.hapus-latihan').click(function(){
			const latihan_id = $(this).data('latihan_id');
			swal({
				title: "Hapus latihan ini?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location = "/guru/latihan/delete/"+latihan_id;
				}
			});
		});
    
    // $('.hapus-soal-latihan').click(function(){
    //   var latihan_id = $(this).attr('latihan_id');
    //   var pilgan_id = $(this).attr('pilgan_id');
    //   swal({
    //     title: "Yakin?",
    //     text: "Menghapus soal ini ?",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((willDelete) => {
    //     if (willDelete) {
    //       window.location = "/guru/latihan/delete/"+latihan_id+"/"+pilgan_id;
    //     }
    //   });
    // });

</script>

<!-- Create Modal (Pilgan)-->
<div class="modal fade create_modal_pilgan"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
<div class="modal-content">
<div class="modal-header ">
<h5 class="modal-title " id="exampleModalLabel"> Tambahkan Soal Baru</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="{{route('storeSoal')}}" enctype="multipart/form-data" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal-body">
<div class="container">
<div class="row">
<div class="col-md-12">

{{-- <div class="form-group">
<label for="Pertanyaan" class="col-form-label">Poin</label>
<input type="text" class="form-control" name="poin"  id="poin">
</div> --}}

<div class="form-group">
<label for="Pertanyaan" class="col-form-label">Pertanyaan</label>
<textarea class="form-control ckeditor" name="pertanyaan" rows="auto" cols="auto" id="Pertanyaan"></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="PilA" class="col-form-label">Pilihan A</label>
<textarea class="form-control" name="pil_a" rows="auto" cols="auto" id="PilA"></textarea>
</div>
<div class="form-group">
<label for="PilB" class="col-form-label">Pilihan B</label>
<textarea class="form-control" name="pil_b" rows="auto" cols="auto" id="PilB"></textarea>
</div>
<div class="form-group">
<label for="PilC" class="col-form-label">Pilihan C</label>
<textarea class="form-control" name="pil_c" rows="auto" cols="auto" id="PilC"></textarea>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="PilD" class="col-form-label">Pilihan D</label>
<textarea class="form-control" name="pil_d" rows="auto" cols="auto" id="PilD"></textarea>
</div>
<div class="form-group">
<label for="PilE" class="col-form-label">Pilihan E</label>
<textarea class="form-control" name="pil_e" rows="auto" cols="auto" id="PilE"></textarea>
</div>
<div class="form-group">
<input type="file" name="foto">
<p><strong>*Klik untuk menambah gambar</strong></p>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="kunci" class="col-form-label">Kunci</label>
<select class="form-control" name="kunci" id="kunci" >
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
</select>
</div>
</div>
</div>

</div>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-sm btn-info" >Buat Soal</button>
</div>
</form>
</div>
</div>
</div>
<!-- Penutup Create Modal -->
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

<script>
ClassicEditor
            .create( document.querySelector( '#Pertanyaan' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilA' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilB' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilC' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilD' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilE' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

<!-- Update Modal (Pilgan)-->
<div class="modal fade update_modal_pilgan"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
        <div class="modal-content">
                <div class="modal-header ">
                        <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Soal Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="{{route('updateSoal')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <input type="hidden" class="form-control" name="id"  id="pilgan_id_update">
                                {{-- <div class="form-group">
                                        <label for="Pertanyaan" class="col-form-label">Poin</label>
                                        <input type="text" class="form-control" name="poin"  id="poin_update">
                                </div> --}}

                                <div class="form-group">
                                        <label for="Pertanyaan" class="col-form-label">Pertanyaan</label>
                                        <textarea class="form-control" name="pertanyaan" rows="auto" cols="auto" id="pertanyaan_update"></textarea>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label for="PilA" class="col-form-label">Pilihan A</label>
                                        <textarea class="form-control" name="pil_a" rows="auto" cols="auto" id="pil_a_update"></textarea>
                                </div>
                                <div class="form-group">
                                        <label for="PilB" class="col-form-label">Pilihan B</label>
                                        <textarea class="form-control" name="pil_b" rows="auto" cols="auto" id="pil_b_update"></textarea>
                                </div>
                                <div class="form-group">
                                        <label for="PilC" class="col-form-label">Pilihan C</label>
                                        <textarea class="form-control" name="pil_c" rows="auto" cols="auto" id="pil_c_update"></textarea>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label for="PilD" class="col-form-label">Pilihan D</label>
                                        <textarea class="form-control" name="pil_d" rows="auto" cols="auto" id="pil_d_update"></textarea>
                                </div>
                                <div class="form-group">
                                        <label for="PilE" class="col-form-label">Pilihan E</label>
                                        <textarea class="form-control" name="pil_e" rows="auto" cols="auto" id="pil_e_update"></textarea>
                                </div>
                                <div class="form-group">
                                        <input type="file" name="foto">
                                        <p><strong>*Klik untuk menambah gambar</strong></p>
                                </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <label for="kunci" class="col-form-label">Kunci</label>
                                        <select class="form-control" name="kunci" id="kunci_update" >
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                        </select>
                                </div>
                        </div>
                </div>
                </div>

        <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-info" >Ubah Soal</button>
        </div>
        </form>
</div>
</div>
</div>
<!-- Penutup Create Modal -->
@endsection
