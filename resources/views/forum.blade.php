@extends('layouts.master-dashboard-guru')

@section('content')    
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
@endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

	<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading" style="margin-bottom:20px;">
						<div class="col-md-6">
        					<h3 class="panel-title">Ruang Diskusi</h3>
      					</div>
      					<div class="col-md-6">
							<a href="#" class="btn btn-info" style="float:right" data-toggle="modal" data-target=".create_modal_diskusi">Mulai Diskusi Baru</a>
      					</div>
						</div>

						<div class="panel-body">
							
						<div class="row">
	 						<table class="table table-bordered">
				 			<thead>
			 					<tr>
									<th>Topik</th>
									<th>Penulis</th>
									<th>Tanggal</th>
									<th>Aksi</th>
			 					</tr>
		 					</thead>
		 					<tbody>
		 						@forelse($forum as $item)
		   						<tr>
									<td>{{$item->topik}}</td>
									<td>{{$item->user->username}}</td>
									<td>{{$item->created_at}}</td>
									<td>
										<a href="{{route('showForum',$item->id)}}" class="btn btn-info">Buka</a>
									</td>
			 					</tr>
		 						@empty
								<tr>
									<td colspan="4"> Belum ada diskusi yang di buat</td>
								</tr>
			 					@endforelse
		 					</tbody>
		 					</table>
   							</div>
						@endsection
						
						</div>
					</div>
					<!-- END OVERVIEW -->
	</div>

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
					<div class="col-md-6">
						<div class="form-group">
							<label for="Topik" class="col-form-label">Topik Forum</label><br/>
							<input type="text" class="form-control" name="topik" id="topik"></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
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