@extends('layouts.master-dashboard-siswa')
<?php  use App\Siswa;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
?>
@section('content')  

@if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
		
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="{{ url('images/' . $siswa->foto) }}" width="150px"  class="img-circle" alt="Avatar">
								<h3 class="name">{{auth()->user()->username}}</h3>
								<span class="online-status status-available">Online</span>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<h4 class="heading">Info Lainnya</h4>
						<!-- AWARDS -->
						<div class="awards">
							<div class="row">
							<h5 class="heading">Nama Lengkap : <span style="float:right;">  {{ $siswa->nama_lengkap }}</span></h5>
							<h5 class="heading">Nomor Induk : <span style="float:right;"> {{ $siswa->nomor_induk }}</span></h5>
							<h5 class="heading">Jenis Kelamin : <span style="float:right;"> {{ $siswa->jk }}</span></h5>
							<h5 class="heading">Email : <span style="float:right;"> {{auth()->user()->email}}</span></span></h5>		
							</div>
							<div class="text-center">
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
						<!-- END AWARDS -->
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>
		
		@else
		
		<div class="container-fluid">
			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="{{asset('assets_2/img/user-medium.png')}}" class="img-circle" alt="Avatar">
								<h3 class="name">{{auth()->user()->username}}</h3>
								<span class="online-status status-available">Online</span>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<form action="{{route('storeProfilSiswa')}}" method="post" enctype="multipart/form-data" >
						@csrf
						<div class="profile-detail">
							<div class="profile-info">
								<h4 class="heading">Silahkan Lengkapi Data Anda</h4>
								<ul class="list-unstyled list-justify">
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
									<li>Email <input type="email" class="form-control" placeholder="{{auth()->user()->email}}" readonly ></li>
									<li>Nama Lengkap<input type="text" class="form-control" name="nama_lengkap"> 
										@if($errors->has('nama_lengkap'))
											<span class="help-block">{{$errors->first('nama_lengkap')}}</span>
										 @endif
									</li>
									<li>Nomor Induk <input type="text" class="form-control" name="nomor_induk">
										@if($errors->has('nomor_induk'))
											<span class="help-block">{{$errors->first('nomor_induk')}}</span>
										@endif
									</li>
									<li>Jenis Kelamin 
									<select class="form-control" name="jk" id="jk" >
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
									</select>
										@if($errors->has('jk'))
											<span class="help-block">{{$errors->first('jk')}}</span>
										@endif
									</li>
									<li>Gambar <input type="file" class="form-control"  name="foto">
										@if($errors->has('foto'))
											<span class="help-block">{{$errors->first('foto')}}</span>
										@endif
									</li>
								</ul>
							</div>
							<div class="text-center"><button type='submit' class="btn btn-primary">Simpan</button></div>
						</div>
						</form>
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<h4 class="heading">Samuel's Awards</h4>
						<!-- AWARDS -->
						<div class="awards">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-sun award-icon"></span>
										</div>
										<span>Most Bright Idea</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-clock award-icon"></span>
										</div>
										<span>Most On-Time</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-magic-wand award-icon"></span>
										</div>
										<span>Problem Solver</span>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="award-item">
										<div class="hexagon">
											<span class="lnr lnr-heart award-icon"></span>
										</div>
										<span>Most Loved</span>
									</div>
								</div>
							</div>
							<div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
						</div>
						<!-- END AWARDS -->
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
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
		@section('linkfooter')
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
									<div class="col-md-4">
											<div class="form-group text-center">
												<img src="" class="mb-3"  height="200px" width="100%"  id="foto_update">
												<input type="file" name="foto">
												<p><strong>*biarkan kosong jika tidak ingin mengubah foto</strong></p>
											</div>
										</div>
										<div class="col-md-4">
											<input type="hidden"  name="id" id="id_update" value="">
											<div class="form-group">
												<label for="nama_lengkap" class="col-form-label">Nama Lengkap</label>
												<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap_update"  value="">
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
	