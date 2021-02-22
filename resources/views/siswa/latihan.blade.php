@extends('layouts.master-dashboard-siswa')
@section('title','Kerjakan Latihan')
@section('content')
<style>
@media screen and (max-width: 1000px) {
   #mulai-ujian {max-width:100%;}
   #fullscreenExam{
     height: 100%;
     overflow-y: scroll;
   }
}
:fullscreen {
  background:linear-gradient(360deg, rgba(247, 253, 251, 0.85) -4.38%, rgba(118, 235, 179, 0.85) 19.69%, rgba(140, 39, 225, 0.85) 98.54%);
}
.head_exam {
  background: linear-gradient(180deg, rgba(17, 0, 23, 0.96) -83.9%, rgba(44, 5, 60, 0.96) -2.49%, #5E2575 54.53%, #BEA2CF 111.53%);
  border-radius: 20px 20px 0px 0px;
  border: none;
}

p{
  display: inline;
}

</style>
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
            <h3 class="panel-title">Halaman Latihan</h3>
        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="panel-body">
        <div class="text-center">
            <a href="#" class="btn btn-primary" style="width:200px;" id="start_latihan">Mulai Latihan</a>
        </div>
    </div>
<div>

<div id=fullscreenExam style="display: none;">
  <div class="container">
<br> <br>

    <div class="row">
      <div class="col-md-12">
        <div class="card pt-3 pl-5 pr-5 pb-3 head_exam">
          <div class="text-center"> <h4 style="color:white;"> <strong>Soal Latihan</strong></h4> </div>
        </div>
      </div>
    </div>

    <div id="table_data">
      @include('siswa.latihan_data')

    </div>

    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4">
         <button class="btn btn-danger" id="close_latihan"> Akhiri Latihan </button>
      </div>

    </div>
  </div>
</div>



<script>
$(document).ready(function(){
    const latihan_siswa_id = $('#latihan_siswa_id').val();
    $("#close_latihan").hide();
    var elem = document.querySelector("#fullscreenExam");

    $("#start_latihan").click(function(e){
        $("#fullscreenExam").show();
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        }
    })


        $(document).on('click', '.pagination a',function(event){
            event.preventDefault(); //stop refresh webpage
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        const fetch_data = (page) => {

            $.ajax({
                url:"/latihan/fetch_data?page="+page,
                type: "GET",
                data: {
                    latihan_siswa_id: latihan_siswa_id
                },
                success: function(soal_latihan)
                {
                    $('#table_data').html(soal_latihan);
                }
            });

            if (page == 10) {
            $("#close_latihan").show();
            }else{
            $("#close_latihan").hide();
            }
        }

        $("#close_latihan").click(function (e) {
            e.preventDefault();
            closeFullscreen();
        });

        function closeFullscreen() {
            $.ajax({
                type: "GET",
                url: "/latihan/check",
                data: {
                   latihan_siswa_id: latihan_siswa_id
                },
                success: function (response) {

                    if(response.isComplete === true){
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                            $("#fullscreenExam").hide();
                            window.location = "/latihan/finish/"+ latihan_siswa_id;
                        }
                    }else{
                        alert(response.pesan);
                        $("#fullscreenExam").css('display','none');
                    }
                }
            });


        }


});
</script>

@endsection
