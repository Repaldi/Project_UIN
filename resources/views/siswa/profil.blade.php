@extends('layouts.master-dashboard-rhs-siswa')
<?php  use App\Siswa;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
?>
@section('content')  

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
	@if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
		  <div class="card card-profile">
            <img src="{{asset('assets_rhs_1/img/theme/bg.jpg')}}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ url('images/' . $siswa->foto) }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-center">
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".update_modal_profil"
											id="updateProfilSiswa"
											data-id_update="{{ $siswa->id }}"
											data-nama_lengkap_update="{{ $siswa->nama_lengkap }}"
											data-nomor_induk_update="{{ $siswa->nomor_induk }}"
											data-jk_update="{{ $siswa->jk}}"
											data-foto_update="{{ $siswa->foto }}"
											title="Edit {{$siswa->nama_lengkap}}" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-edit mr-2" ></i>Edit Data</button>

              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
				{{ $siswa->nama_lengkap }}<span class="font-weight-light">, {{ $siswa->nomor_induk}}</span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{auth()->user()->email}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>FISIKA
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>SMA NEGERI 3 SUNGAI PENUH
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
	@else
	<div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Lengkapi Profil Anda</h3>
                </div>
				        <form action="{{route('storeProfilSiswa')}}" method="post" enctype="multipart/form-data" >
				        @csrf

        <div class="col-4 text-right">
				  <button type='submit' class="btn btn-sm btn-primary">Simpan</button>
                </div>
              </div>
            </div>
            <div class="card-body">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Pengguna</label>
                        <input type="text" class="form-control" placeholder="Username" value="{{auth()->user()->username}}" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Alamat Email</label>
                        <input type="email" class="form-control" placeholder="{{auth()->user()->email}}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nama Lengkap<font color="red">*</font></label>
                        <input type="text" name="nama_lengkap" class="form-control" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Nomor Induk<font color="red">*</font></label>
                        <input type="text"  name="nomor_induk" class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jenis Kelamin<font color="red">*</font></label>
                        <select class="form-control" name="jk" id="jk" >
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
									      </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Gambar<font color="red">*</font></label>
                        <input type="file" class="form-control"  name="foto" >
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <p class=" text-muted mb-4">Tanda <font color="red">*</font> artinya form wajib di isi.</p>
              </form>
            </div>
          
    </div>
	@endif
	
	


	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('click','#updateProfilSiswa', function(){
				var id_update              		= $(this).data('id_update');
				var nama_lengkap_update       	= $(this).data('nama_lengkap_update');
				var nomor_induk_update          = $(this).data('nomor_induk_update');
				var jk_update                	= $(this).data('jk_update');
				var foto_update           		= $(this).data('foto_update');
				$('#id_update ').val(id_update);
				$('#nama_lengkap_update').val(nama_lengkap_update);
				$('#nomor_induk_update').val(nomor_induk_update);
				$('#jk_update').val(jk_update);
				$('#foto_update').attr("src", "{{url('images')}}"+"/"+foto_update);
			});
		});
	</script>
@endsection
		
@if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
		<!-- Update Modal (Profil)-->
		<div class="modal fade update_modal_profil"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" >
					<div class="modal-content">
						<div class="modal-header ">
							<h5 class="modal-title " id="exampleModalLabel"> Edit Profil </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('updateProfilSiswa',$siswa->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							 <div class="modal-body">
								<div class="container">
									<div class="row">
									<div class="col-md-6">
											<div class="form-group text-center">
												<img src="" class="mb-3"  height="400px" width="100%"  id="foto_update">
												<input type="file" name="foto">
											</div>
										</div>
										<div class="col-md-6">
											<input type="hidden"  name="id" id="id_update" value="">
											<div class="form-group">
												<label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
												<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap_update"  value="">
                        <p><strong>*biarkan kosong jika tidak ingin mengubah foto</strong></p>
                        </div>
											<div class="form-group">
												<label for="nomor_induk" class="col-form-label">Nomor Induk</label>
												<input type="text" class="form-control" name="nomor_induk" id="nomor_induk_update"  value="">
											  </div>
											<div class="form-group">
												<label for="jk" class="col-form-label">Jenis Kelamin</label>
												<select class="form-control" name="jk" id="jk_update"  >
														<option value="Laki-laki">Laki-laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
											  </div>
										</div>
									</div>
		
								</div>
							 </div>
		
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-info" onclick=alertUpdate()>Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		
		<!-- Penutup Update Profil -->
@else
@endif