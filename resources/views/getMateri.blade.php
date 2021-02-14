@extends('layouts.master-dashboard-guru')
@section('title','Materi Saya')
@section('content')
<style>
    /* .main-content{
        background: url('images/background.jpg');
    } */
</style>

@if(auth()->user()->role == 1)
<div class="col-md-12">
    <!-- TABLE STRIPED -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Materi</h3>
            <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambah_materi">Tambah Materi</a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Materi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materi as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->judul_materi}}</td>
                        <td>
                            <a href="{{route('showMateri',$item->id)}}" class="btn btn-primary">Buka</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END TABLE STRIPED -->
</div>
@else

    <!-- TABLE STRIPED -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Materi</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                @foreach ($materi as $item)

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{$item->judul_materi}}</h3>
                            <p class="card-text">{!!Str::limit($item->materi,20)!!}</p>
                            <a href="{{route('showMateri',$item->id)}}" class="btn btn-primary">Buka</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END TABLE STRIPED -->

@endif

<div class="modal fade" id="tambah_materi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('storeMateriBaru')}}" method="POST">
              @csrf
              <input type="text" class="form-control" placeholder="Judul Materi" name="judul_materi">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
      </div>
    </div>
</div>
@endsection
