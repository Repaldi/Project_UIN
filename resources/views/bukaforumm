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
                                                    <form>
                                                </div>
                                            </div>
                                        </div>
								</div>
							</div>
						</div>			
					</div>
					<!-- END OVERVIEW -->
				</div>

                @forelse($forum_jawab as $item)
                <div class="col-md-12" style="padding-right:20px; padding-top:5px; background-color: #edf5ee;">
                @if($item->user_id == Auth::user()->id )
							<!-- PANEL HEADLINE -->
							
								<div class="col-md-6 panel-body" style="color : white;border-radius: 10px; float:right;background-color: #13a825">
									<h4>Oleh : {{$item->user->username}}  </h4>
									<p>{!!$item->isi_pesan!!}</p>	<p style="float:right">{{$item->created_at}}</p>
                                </div>
							
							<!-- END PANEL HEADLINE -->
                       
                            @else
            	        <!-- PANEL HEADLINE -->
							
								<div class="col-md-6 panel-body" style=" border-radius: 10px;  background-color: white; float:left;">
									<h4>Oleh : {{$item->user->username}}  </h4>
									<p>{!!$item->isi_pesan!!}</p>	<p style="float:right">{{$item->created_at}}</p>
                                </div>
							
							<!-- END PANEL HEADLINE -->
                @endif	
                          
				</div>	
                	
                @empty
                @endforelse 
@endsection
                                         