@extends('layouts.master-dashboard-guru')
@section('title','Materi')
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
<div class="panel">
  <div class="panel-heading" style="margin-bottom:20px;">
    <div class="col-md-6">
      <h3 class="panel-title">Halaman Materi</h3>
    </div>
    <div class="col-md-6">

    </div>
  </div>
  <hr>
  <div class="panel-body">
  @if($materi == null)
  <form action="{{route('storeMateri')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-lg-2">
        Gambar
      </div>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="gambar">
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="col-lg-2">
        Video
      </div>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="video">
      </div>
    </div>


    <div class="panel-heading">
        <h3 class="panel-title">Materi</h3>
    </div>
    <div class="row mt-5" style="margin-top:0px;">
        <textarea class="form-control" name="materi" rows="auto" cols="auto" id="materi" rows="10">{{old('materi')}}</textarea>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="col-lg-10">
        <button type="submit" name="button" class="btn btn-primary"> <i class="lnr lnr-upload"></i>Simpan</button>
      </div>
    </div>
  </form>
  @else
  <form action="{{route('updateMateri')}}" method="post" enctype="multipart/form-data">
    @csrf @method('PATCH')
    <div class="row">
      <div class="col-lg-2">
        Gambar
      </div>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="gambar" value="{{url('asset-materi'.$materi->gambar)}}">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">

      </div>
      <div class="col-lg-10">
        <img src="{{url('asset-materi/'.$materi->gambar)}}" alt="" style="width: 200px; height: 160;">
      </div>
    </div>
    <div class="row" style="margin-top:20px;">
      <div class="col-lg-2">
        Video
      </div>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="video" value="{{url('asset-materi'.$materi->video)}}">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2">

      </div>
      <div class="col-lg-10">
        <iframe src="{{url('asset-materi/'.$materi->video)}}" width="" height=""></iframe>
      </div>
    </div>


    <div class="panel-heading">
        <h3 class="panel-title">Materi</h3>
    </div>
    <div class="row mt-5" style="margin-top:0px;">
        <textarea class="form-control" name="materi" rows="auto" cols="auto" id="materi" rows="10">{{$materi->materi}}</textarea>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="col-lg-10">
        <button type="submit" name="button" class="btn btn-primary"> <i class="lnr lnr-upload"></i>Simpan</button>
      </div>
    </div>
  </form>
  @endif
  </div>
</div>
@endsection
@section('linkfooter')
<script>
ClassicEditor
            .create( document.querySelector( '#materi' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
              console.error( error );
            } );
</script>
@endsection
