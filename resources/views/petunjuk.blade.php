@extends('layouts.master-dashboard-guru')
@section('title','Petunjuk')
@section('content')
<style>
    .main{
        background: url('/images/background2.jpeg') !important;
    }
    .panel{
        background: url('/images/background2.jpeg') !important;
        /* background-color: red; */
    }

    span,h1,h2,h3,h4,h5,h6,p,b,li,ul,ol{
    color: #fffefa;
    text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
    }
</style>
@if(auth()->user()->role==1)
<div class="panel">
    <form action="{{route('storePetunjuk')}}" method="post">
    @csrf
        <div class="panel-heading">
            <div class="col-md-6">
            <h3 class="panel-title">Halaman Petunjuk</h3>
            </div>
            <!-- <div class="col-md-6">
                <a href="#" class="btn btn-primary navbar-btn-right">Simpan</a>
                <button type="submit" class="btn btn-primary navbar-btn-right">Simpan</button>
                <button type="button" class="btn btn-primary">Primary</button>
            </div> -->
        </div>
        <div class="panel-body" style="margin-top: 10px;">
            @if($petunjuk == null)
            <div class="row mt-5" style="margin-top:10px;">
                <textarea class="form-control" name="petunjuk" rows="auto" cols="auto" id="petunjuk"></textarea>
            </div>
            @else
            <div class="row mt-5" style="margin-top:10px;">
                <textarea class="form-control" name="petunjuk" rows="auto" cols="auto" id="petunjuk">{!!$petunjuk->petunjuk!!}</textarea>
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
        <h3 class="panel-title">Petunjuk Penggunaan</h3>
        <!-- <p class="panel-subtitle">Panel to display most important information</p> -->
    </div>
    <div class="panel-body">
        <!-- <h4>Panel Content</h4> -->
        <p>{!!$petunjuk->petunjuk!!}</p>
    </div>
</div>
@endif
@endsection
@section('linkfooter')
<script>
ClassicEditor
            .create( document.querySelector( '#petunjuk' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@stop
