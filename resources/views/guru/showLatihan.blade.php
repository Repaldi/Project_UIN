@extends('layouts.master-dashboard-guru')
@section('title','Hasil Latihan Siswa')
@section('content')
<style>
    p{
        display: inline;
        font-size: x-large;
    }

    .isi{
        margin-bottom: 15px;
    }
</style>
<div class="panel">
    <div class="panel-heading" style="margin-bottom:20px;">
      <div class="col-md-6">
        <h3 class="panel-title">Hasil Latihan {{$user->username}}</h3>
      </div>

    </div>
    <div class="panel-body">
        @php
            $i = 0;
        @endphp
        @foreach($latihan_jawab as $item)
        <div class="row">
            <div class="col-md-12">
                <h3>Soal No.  <?php  $i++;  echo $i; ?> </h3>


                    <div class="subjudul"> Pertanyaan : </div>
                    @if($item->pilgan->foto != null)
                    <div class="text-center">
                        <img src="{{url('asset-quiz/'.$item->quiz->foto)}}" alt="" style="max-width: 200px; margin:auto;">
                    </div>
                    @endif
                    <div class="isi"> {!!$item->pilgan->pertanyaan!!}
                        @if($item->status == 'T')
                            <img src="{{asset('asset-quiz/check.png')}}" alt="" style="width: 20px;">
                        @else
                            <img src="{{asset('asset-quiz/incorrect.png')}}" alt="" style="width: 20px;">
                        @endif
                    </div>
                    <div class="subjudul"> Pilihan : </div>
                    <div class="isi">    A . {!!$item->pilgan->pil_a!!}  <br>
                        B . {!!$item->pilgan->pil_b!!}  <br>
                        C . {!!$item->pilgan->pil_c!!}  <br>
                        D . {!!$item->pilgan->pil_d!!}  <br>
                        E . {!!$item->pilgan->pil_e!!} </div>
                    <div class="subjudul"> Kunci Jawaban : {{$item->pilgan->kunci}}</div>
            </div>


        </div>
        <hr>
        @endforeach
    </div>
</div>
@endsection
