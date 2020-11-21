@extends('layouts.master-dashboard-admin')
@section('content')    
<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
<!-- OVERVIEW -->
<!-- TABLE STRIPED -->
<div class="panel">
<div class="panel-heading">
    <h2 class="panel-title">Data Siswa</h2>
    <a href="{{route('datasiswaCreate')}}" style="float:right;" class="btn btn-default btn-xs"><i class="fa fa-plus-square"></i> Tambahkan Guru </a>
</div>
<div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Kata Sandi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($siswa as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->password}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Data Belum Ada</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <!-- END TABLE STRIPED -->
</div>
</div>
<!-- END OVERVIEW -->
</div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@stop
