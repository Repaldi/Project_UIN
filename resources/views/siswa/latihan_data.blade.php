@php
    use App\LatihanJawab;
@endphp

<div class="row">
  <div class="col-md-12">
    <div class="card" style=" border-radius: 0px 0px 20px 20px; background: white;">
      <div class="card-body " >
        <?php $i=1; ?>
        @foreach($soal_latihan as $item)

            <div class=" container row" >
                <div class="col-md-3"><h6>Soal No. {{$soal_latihan ->perPage()*($soal_latihan->currentPage()-1)+$i}}   </h6></div>
                <!-- <div class="col-md-8 text-right"><h6>Poin : </h6></div> -->
            </div>
            @if($item->foto != null)
            <div class="container row text-center">
              <img src="{{url('images/soal/'.$item->foto)}}" alt="" style="width: 200px;">
            </div>
            @endif
            <div class="container" >
            <table >

                <tr>
                    <td><b> Pertanyaan </b> :<br/> <p>{!!$item->pertanyaan!!} </p> </td>
                </tr>
                <tr>
                    <td>
                        @php
                            $check_jawaban = LatihanJawab::where('user_id', Auth::user()->id)
                                    ->where('pilgan_id', $item->id)
                                    ->where('latihan_siswa_id', $latihan_siswa_id)->first();
                        @endphp
                        @if(!$check_jawaban)
                        <input type="radio" class="pilihan" name="pilihan" value="A" > A . {!!$item->pil_a!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="B" > B . {!!$item->pil_b!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="C" > C . {!!$item->pil_c!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="D" > D . {!!$item->pil_d!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="E" > E . {!!$item->pil_e!!}  <br>
                        @else
                        <input type="radio" class="pilihan" name="pilihan" value="A" id="jawab_a"> A . {!!$item->pil_a!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="B" id="jawab_b"> B . {!!$item->pil_b!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="C" id="jawab_c"> C . {!!$item->pil_c!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="D" id="jawab_d"> D . {!!$item->pil_d!!}  <br>
                        <input type="radio" class="pilihan" name="pilihan" value="E" id="jawab_e"> E . {!!$item->pil_e!!}  <br>

                        @if($check_jawaban->jawaban == 'A')
                        <script>
                            $('#jawab_a').prop('checked',true);
                        </script>
                        @elseif($check_jawaban->jawaban == 'B')
                        <script>
                            $('#jawab_b').prop('checked',true);
                        </script>
                        @elseif($check_jawaban->jawaban == 'C')
                        <script>
                            $('#jawab_c').prop('checked',true);
                        </script>
                        @elseif($check_jawaban->jawaban == 'D')
                        <script>
                            $('#jawab_d').prop('checked',true);
                        </script>
                        @else
                        <script>
                        $('#jawab_e').prop('checked',true);
                        </script>
                        @endif
                        @endif

                    </td>
                </tr>
                <input type="hidden" id="soal_latihan_id" value="{{$item->id}}">

                <input type="hidden" id="kunci" value="{{$item->kunci}}">

            </table>
            </div>

            <hr>
        @endforeach



      </div>
    </div>
  </div>

  {{-- <div class="col-md-4">
    <div class="card" style=" border-radius: 0px 0px 20px 20px;">
      <div class="card-header"  style=" background: #EDE5E5;  border-radius: 0px 0px 0px 0px;">Navigasi</div>
      <div class="card-body">
        <div class="row ">
          <div class="col-12 text-center " style=" overflow: Auto;">
          {!! $soal_latihan->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>
<div class="row">
  <div class="col-12 text-center " style=" overflow: Auto;">
    {!! $soal_latihan->links() !!}
  </div>
</div>

    <input type="hidden" value="{{$latihan_siswa_id}}" id="latihan_siswa_id">
    <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
    <!-- <input type="hidden" value="" id="peserta_id"> -->

<script>
// Pengaturan JS untuk simpan jawaban essay

// Pengaturan JS untuk simpan jawaban pilgan
$('input[type=radio][name="pilihan"]').click(function() {
    var jawab_latihan = document.querySelector('input[name = "pilihan"]:checked').value;
    var soal_latihan_id    = $("#soal_latihan_id").val();
    var user_id         = $("#user_id").val();
    var latihan_siswa_id   = $('#latihan_siswa_id').val();
    var kunci           = $("#kunci").val();

    // var peserta_id   = $("#peserta_id").val();
    // var poin        = $("#poin").val();
    if ( jawab_latihan == kunci ) {
        var status = "T";
    } else {
        var status = "F";
    }
    $.ajax({
        url: "{{ url('store/latihan_jawab') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_latihan: jawab_latihan,
            soal_latihan_id: soal_latihan_id,
            user_id: user_id,
            status: status,
            latihan_siswa_id: latihan_siswa_id
        },
        success: function(data) {
                    console.log(data);
                }
    });
});

</script>
