@extends('layouts.master-dashboard-guru')
@section('title','Kompetensi Dasar & Tujuan')
@section('content')
<style>
    .main{
        background: url('{{asset("images/background2.jpeg")}}') !important;
    }

    .panel{
        background: url('{{asset("images/background2.jpeg")}}') !important;
    }

    span,h1,h2,h3,h4,h5,h6,p,b,li,ul,ol{
    color: #00000;
    }
</style>
@if(auth()->user()->role==1)
<div class="panel">
    @if ($errors->any())
    <div class="row">
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    </div>
    @endif
    <form action="{{route('storeKDTujuan')}}" method="post">
    @csrf
        <div class="panel-heading">
            <div class="col-md-6">
            <h1 class="panel-title">Halaman KI & Tujuan</h1>
            </div>
            <!-- <div class="col-md-6">
                <a href="#" class="btn btn-primary navbar-btn-right">Simpan</a>
                <button type="submit" class="btn btn-primary navbar-btn-right">Simpan</button>
                <button type="button" class="btn btn-primary">Primary</button>
            </div> -->
        </div>
        <div class="panel-body" style="margin-top: 10px;">
            @if($kdtujuan == null)

                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="row mt-5" style="margin-top:0px;">
                    <textarea class="form-control" name="kd" rows="auto" cols="auto" id="kd"></textarea>
                </div>


                <div class="panel-heading" style="margin-top:10px;">
                    <h3 class="panel-title">Tujuan</h3>
                </div>
                <div class="row mt-5" style="margin-top:0px;">
                    <textarea class="form-control" name="tujuan" rows="auto" cols="auto" id="tujuan"></textarea>
                </div>

            @else
                <div class="panel-heading">
                    <h3 class="panel-title">Kompetensi Dasar</h3>
                </div>
                <div class="row mt-5" style="margin-top:0px;">
                    <textarea class="form-control" name="kd" rows="auto" cols="auto" id="kd">{!!$kdtujuan->kd!!}</textarea>
                </div>
                <div class="panel-heading" style="margin-top:10px;">
                    <h3 class="panel-title">Tujuan</h3>
                </div>
                <div class="row mt-5" style="margin-top:0px;">
                    <textarea class="form-control" name="tujuan" rows="auto" cols="auto" id="tujuan">{!!$kdtujuan->tujuan!!}</textarea>
                </div>
            @endif
            <div class="row" style="margin-top:10px;">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@else
<div class="panel panel-headline">
    <div class="panel-heading">
        <b><h3 class="panel-title">KI & KD</h3></b>
        <!-- <p class="panel-subtitle">Panel to display most important information</p> -->
    </div>
    <div class="panel-body">
        <!-- <h4>Panel Content</h4> -->
        <p>{!!$kdtujuan->kd!!}</p>
    </div>

    <div class="panel-heading">
        <b><h3 class="panel-title">Tujuan</h3></b>
        <!-- <p class="panel-subtitle">Panel to display most important information</p> -->
    </div>
    <div class="panel-body">
        <!-- <h4>Panel Content</h4> -->
        <p>{!!$kdtujuan->tujuan!!}</p>
    </div>
</div>
@endif
@endsection
@section('linkfooter')
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
            .create( document.querySelector( '#kd' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#tujuan' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@stop
