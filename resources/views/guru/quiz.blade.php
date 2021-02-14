@extends('layouts.master-dashboard-guru')
@section('title','Buat Soal Quiz')
@section('content')
<style>
.subjudul {
    text-align:left;
    font-weight:bold;
}
.isi {
    margin-left:30px;
}
</style>
<div class="panel">
  <div class="panel-heading" style="margin-bottom:20px;">
    <div class="col-md-6">
      <h3 class="panel-title">Soal Quiz</h3>
    </div>
    <div class="col-md-6">
      <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target=".create_soal_quiz">Tambah Soal Quiz</a>
    </div>
  </div>
  <div class="panel-body">
    @if($quiz != null)
    <div class="container">
      <?php $i=0; ?>
      @foreach($quiz as $item)
          <div class="row">
              <div class="col-md-8">
                  <h6>Soal No.  <?php  $i++;  echo $i; ?> </h6>




                      <div class="subjudul"> Pertanyaan : </div>
                      <div class="isi"> {!!$item->pertanyaan!!} </div>
                      <div class="subjudul"> Pilihan : </div>
                      <div class="isi">    A . {{$item->pil_a}}  <br>
                          B . {{$item->pil_b}}  <br>
                          C . {{$item->pil_c}}  <br>
                          D . {{$item->pil_d}}  <br>
                          E . {{$item->pil_e}} </div>
                      <div class="subjudul"> Kunci Jawaban : {{$item->kunci}}</div>
              </div>

              <div class="col-md-4">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <!-- <span class="input-group-text" id="basic-addon1" style="background-color:#EDE5E5;">Poin</span> -->
                      </div>
                      <div class="row" style="margin-bottom: 5px;">
                        <button class="btn btn-info" data-toggle="modal" data-target=".update_soal_quiz"
                        id="updateSoalQuiz"
                        data-soal_quiz_id_update="{!! $item->id !!}"
                        data-pertanyaan_update="{!! $item->pertanyaan !!}"
                        data-pil_a_update="{!! $item->pil_a !!}"
                        data-pil_b_update="{!! $item->pil_b !!}"
                        data-pil_c_update="{!! $item->pil_c !!}"
                        data-pil_d_update="{!! $item->pil_d !!}"
                        data-pil_e_update="{!! $item->pil_e !!}"
                        data-foto_update="{!! $item->foto !!}"
                        data-kunci_update="{!! $item->kunci !!}">
                        <i class="fa fa-eye"></i> Edit Soal Quiz</button>
                      </div>
                      <div class="row">
                        <a href="#" class="btn btn-primary">Hapus</a>
                      </div>
                  </div>


              </div>
          </div>
          <hr>
      @endforeach
  </div>
  @endif
    <!-- @foreach($quiz as $item)
    <div class="row">
      <div class="col-lg-2">
        <b>Soal No.</b>
      </div>
      <div class="col=lg-10">
        <div class="row">
          {!!$item->pertanyaan!!}
        </div>
        <div class="row">
          A. {!!$item->pil_a!!}
          B. {!!$item->pil_b!!}
          C. {!!$item->pil_c!!}
          D. {!!$item->pil_d!!}
          E. {!!$item->pil_e!!}
        </div>
        <div class="row">
          Kunci : {{$item->kunci}}
        </div>
      </div>
    </div>
    @endforeach -->
    <div class="row">

    </div>
  </div>
</div>
@endsection
@section('linkfooter')
<!-- Modal Create Soal Quiz -->
<div class="modal fade create_soal_quiz"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md-12" >
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Soal Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('storeSoalQuiz')}}" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group">
                    <label for="Pertanyaan" class="col-form-label">Poin</label>
                    <input type="text" class="form-control" name="poin"  id="poin">
                  </div> -->

                  <div class="form-group">
                    <label for="Pertanyaan" class="col-form-label">Pertanyaan</label>
                    <textarea class="form-control ckeditor" name="pertanyaan" rows="auto" cols="auto" id="Pertanyaan"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="PilA" class="col-form-label">Pilihan A</label>
                    <textarea class="form-control" name="pil_a" rows="auto" cols="auto" id="PilA"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="PilB" class="col-form-label">Pilihan B</label>
                    <textarea class="form-control" name="pil_b" rows="auto" cols="auto" id="PilB"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="PilC" class="col-form-label">Pilihan C</label>
                    <textarea class="form-control" name="pil_c" rows="auto" cols="auto" id="PilC"></textarea>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="PilD" class="col-form-label">Pilihan D</label>
                    <textarea class="form-control" name="pil_d" rows="auto" cols="auto" id="PilD"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="PilE" class="col-form-label">Pilihan E</label>
                    <textarea class="form-control" name="pil_e" rows="auto" cols="auto" id="PilE"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="file" name="foto">
                    <p><strong>*Klik untuk menambah gambar</strong></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="kunci" class="col-form-label">Kunci</label>
                    <select class="form-control" name="kunci" id="kunci" >
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>
          </div>


        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Buat Soal</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Update Soal Quiz -->
<div class="modal fade update_soal_quiz"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md-12" >
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Soal Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('updateSoalQuiz')}}" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @method('PATCH')
        <input type="hidden" name="soal_quiz_id" id="soal_quiz_id_update" value="">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group">
                    <label for="Pertanyaan" class="col-form-label">Poin</label>
                    <input type="text" class="form-control" name="poin"  id="poin">
                  </div> -->

                  <div class="form-group">
                    <label for="Pertanyaan" class="col-form-label">Pertanyaan</label>
                    <textarea class="form-control ckeditor" name="pertanyaan" rows="auto" cols="auto" id="pertanyaan_update"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="PilA" class="col-form-label">Pilihan A</label>
                    <textarea class="form-control" name="pil_a" rows="auto" cols="auto" id="pil_a_update"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="PilB" class="col-form-label">Pilihan B</label>
                    <textarea class="form-control" name="pil_b" rows="auto" cols="auto" id="pil_b_update"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="PilC" class="col-form-label">Pilihan C</label>
                    <textarea class="form-control" name="pil_c" rows="auto" cols="auto" id="pil_c_update"></textarea>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="PilD" class="col-form-label">Pilihan D</label>
                    <textarea class="form-control" name="pil_d" rows="auto" cols="auto" id="pil_d_update"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="PilE" class="col-form-label">Pilihan E</label>
                    <textarea class="form-control" name="pil_e" rows="auto" cols="auto" id="pil_e_update"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="file" name="foto">
                    <label><strong>*Klik untuk mengubah gambar</strong></label>
                    <img src="" alt="" style="width: 100px;" id="foto_update">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="kunci" class="col-form-label" id="kunci_text">Kunci  </label>
                    <select class="form-control" name="kunci" id="kunci" >
                      <option selected id="kunci_update">Ubah Kunci</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>
          </div>


        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Buat Soal</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (Session::has('success-add'))
<script>
    swal({
        title: "Good job!",
        text: "Berhasil menambah soal quiz",
        icon: "success",
        button: "OK",
    });
</script>

@endif

@if (Session::has('error'))
<script>
    swal({
        title: "Oops!",
        text: "Soal sudah mencapai 10, tidak bisa menambah soal lagi",
        icon: "error",
        button: "OK",
    });
</script>

@endif
<script>
$(document).ready(function(){
    $(document).on('click','#updateSoalQuiz', function(){
        var soal_quiz_id_update              = $(this).data('soal_quiz_id_update');
        var pertanyaan_update           = $(this).data('pertanyaan_update');
        var pil_a_update                = $(this).data('pil_a_update');
        var pil_b_update                = $(this).data('pil_b_update');
        var pil_c_update                = $(this).data('pil_c_update');
        var pil_d_update                = $(this).data('pil_d_update');
        var pil_e_update                = $(this).data('pil_e_update');
        var foto_update                 = $(this).data('foto_update');
        var kunci_update                = $(this).data('kunci_update');

        $('#soal_quiz_id_update ').val(soal_quiz_id_update);
        $('#pertanyaan_update').val(pertanyaan_update);
        $('#pil_a_update').val(pil_a_update);
        $('#pil_b_update').val(pil_b_update);
        $('#pil_c_update').val(pil_c_update);
        $('#pil_d_update').val(pil_d_update);
        $('#pil_e_update').val(pil_e_update);

        if (foto_update === null) {
          $('#foto_update').attr("src", "{{url('asset-quiz/tanya.png')}}");
        }else {
          $('#foto_update').attr("src", "{{url('asset-quiz')}}"+"/"+foto_update);
        }

        $('#kunci_update').val(kunci_update);

    });
});
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

<script>
ClassicEditor
            .create( document.querySelector( '#Pertanyaan' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilA' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilB' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilC' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilD' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#PilE' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );


ClassicEditor
            .create( document.querySelector( '#pertanyaan_updatex' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#pil_a_updatex' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#pil_b_updatex' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#pil_c_updatex' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#pil_d_updatex' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
ClassicEditor
            .create( document.querySelector( '#pil_e_updatex' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@stop


