@extends('layouts.master-dashboard-guru')
@section('title','Hasil Latihan Siswa')
@section('content')

@php
    use App\LatihanJawab;
    use App\LatihanSiswa;
@endphp

<div class="panel">
    <div class="panel-heading" style="margin-bottom:20px;">
      <div class="col-md-6">
        <h3 class="panel-title">Daftar Hasil</h3>
      </div>

    </div>
    <div class="panel-body">

      <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Waktu Latihan</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($latihan_siswa->count() != 0)
                @foreach($latihan_siswa as $item)
                <tr>
                    @php
                        $sum_benar = LatihanJawab::where('latihan_siswa_id',$item->id)->where('status','T')->count();

                    @endphp
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->username}}</td>
                    <td>{{date('d M Y',strtotime($item->created_at))}}</td>
                    <td>{{$sum_benar}}</td>
                    <td>
                        <a href="{{route('showHasilLatihan',$item->id)}}" class="btn btn-info">Buka</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
