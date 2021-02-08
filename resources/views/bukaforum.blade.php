@extends('layouts.master-dashboard-siswa')

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
						<div class="panel-heading">
							<h3 class="panel-title">Topik Diskusi : {{$topik}}</h3>
							<p class="panel-subtitle">Oleh : <b> {{$forum->user->username}} </b> - {{$forum->created_at}}</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="">
											<span>{!!$forum->isi_pesan!!}</span>
                                            <p style="float:right"> 
                                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Balas
                                            </a>
                                        </p>
                                        
                                        <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                        <div class="container">
                                        <form action="{{route('storeForumJawab')}}" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="status" value='0'>
                                        <input type="hidden" name="forum_id" value='{{$forum->id}}'>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="isi_pesan" class="col-form-label">Pesan Balasan</label> <br/>
                                                        <textarea class="form-control" name="isi_pesan" rows="auto" cols="auto" id="isi_pesan"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info" >Kirim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>

                                        </div>
                                        </div>
									</div>
								</div>
							</div>
							
							</div>
						</div>
					</div>
                    
					<!-- END OVERVIEW -->
					</div>
                    
				</div>



                <!-- Batas -->

                @forelse($forum_jawab as $item)
                <div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<p class="panel-subtitle">Oleh : <b> {{$item->user->username}} </b> - {{$item->created_at}}</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="">
											<span>{!!$item->isi_pesan!!}</span>
                                            <p style="float:right"> 
                                            <a data-toggle="collapse" href="#balasan" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Balas
                                            </a>
                                        </p>
                                        
                                        <div class="collapse" id="balasan">
                                        <div class="card card-body">
                                        <div class="container">
                                        <form action="{{route('storeForumJawab')}}" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="status" value='0'>
                                        <input type="hidden" name="forum_id" value='{{$forum->id}}'>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="isi_pesan" class="col-form-label">Pesan Balasan</label> <br/>
                                                        <textarea class="form-control" name="isi_pesan" rows="auto" cols="auto" id="isi_pesan"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info" >Kirim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>

                                        </div>
                                        </div>
									</div>
								</div>
							</div>
							
							</div>
						</div>
					</div>
                    
					<!-- END OVERVIEW -->
					</div>
                    
				</div>
                @empty
                @endforelse
@endsection
