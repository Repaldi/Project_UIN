@extends('layouts.master-dashboard-siswa')

@section('content')
<style>
    .main{
        background: url('{{asset("images/background2.jpeg")}}');
    }

    h1{
        color: #fffefa;
  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        /* outline-style: solid;
        outline-color: white; */
    }
</style>
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
	<h1>Selamat datang di portal pembelajaran Fisika</h1>
@endsection
