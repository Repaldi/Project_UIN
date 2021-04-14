@extends('layouts.master-dashboard-rhs-siswa')
@section('title','Materi')
<?php  use App\Siswa;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
?>
@section('content')

<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                @if ( Siswa::where('user_id', Auth::user()->id )->first() != null )
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('images/' . $siswa->foto) }}" width="20%">
                  </span>
                @else
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets_rhs_1/img/theme/react.jpg')}}">
                  </span>
                @endif

                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->username}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">{{auth()->user()->username}}</h6>
                </div>
                <a href="{{route('profilSiswa')}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profilku</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Keluar</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Halaman Quiz</h6>
            </div>
         </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
    <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Sudah Siap Memulai Quiz?</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
              <div class="text-center">
              <a href="#" class="btn btn-primary" style="width:200px;" id="start_quiz">Mulai Quiz</a>
              </div>
              </div>
    </div>
</div>

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

<div id=fullscreenExam style="display: none;">
  <div class="container">
<br> <br>

    <div class="row">
      <div class="col-md-12">
        <div class="card pt-3 pl-5 pr-5 pb-3 head_exam">
          <div class="text-center"> <h4 style="color:white;"> <strong>Soal Quiz</strong></h4> </div>
          <!-- <h6  style="color:#6fedae;"> <strong> Durasi Pengerjaan :  </strong> </h6> -->
          <div style="color:#6fedae; font-weight:bold;" id="teks_durasi"></div>
        </div>
      </div>
    </div>

    <div id="table_data">
      @include('siswa.pagination_data')

    </div>

    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4">
         <button class="btn btn-danger" id="close_quiz"> Akhiri Ujian </button>
      </div>

    </div>
  </div>
</div>

@endsection
@section('linkfooter')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script> --}}
<script>
$(document).ready(function(){
    const quiz_siswa_id = $('#quiz_siswa_id').val();
    $("#close_quiz").hide();
    var elem = document.querySelector("#fullscreenExam");
    // $("#fullscreenExam").hide();

    $("#start_quiz").click(function(e){
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
                url:"/pagination/fetch_data?page="+page,
                type: "GET",
                data: {
                    quiz_siswa_id: quiz_siswa_id
                },
                success: function(soal_quiz)
                {
                    $('#table_data').html(soal_quiz);
                }
            });

            if (page == 5) {
            $("#close_quiz").show();
            }else{
            $("#close_quiz").hide();
            }
        }

        $("#close_quiz").click(function (e) {
            $.ajax({
                type: "GET",
                url: '{{url("quiz/check")}}',
                data: {
                    quiz_siswa_id: quiz_siswa_id
                },
                success: function (response) {
                    alert("ok sudah");
                    if(response.isComplete === true){
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                            $("#fullscreenExam").hide();
                            window.location = "/quiz/finish/"+ quiz_siswa_id;
                        }
                    }else{
                        alert(response.pesan);
                        $("#fullscreenExam").css('display','none');
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
            // closeFullscreen();
        });

        function closeFullscreen() {
            // alert("ok");
            // $.ajax({
            //     type: "GET",
            //     url: "/quiz/check",
            //     data: {
            //         quiz_siswa_id: quiz_siswa_id
            //     },
            //     success: function (response) {
            //         alert("ok sudah");
            //         if(response.isComplete === true){
            //             if (document.exitFullscreen) {
            //                 document.exitFullscreen();
            //                 $("#fullscreenExam").hide();
            //                 window.location = "/quiz/finish/"+ quiz_siswa_id;
            //             }
            //         }else{
            //             alert(response.pesan);
            //             $("#fullscreenExam").css('display','none');
            //         }
            //     },
            //     error: function(xhr, status, error) {
            //         var err = eval("(" + xhr.responseText + ")");
            //         alert(err.Message);
            //     }
            // });


        }


});
</script>
@endsection
