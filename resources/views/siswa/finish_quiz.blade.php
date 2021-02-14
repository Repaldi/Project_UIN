<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Hasil </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets_2/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_2/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_2/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets_2/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets_2/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets_2/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets_2/img/favicon.png')}}">
    <style>
        p{
            display: inline;
            font-size: x-large;
        }

        .isi{
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    @php
        use App\Quiz;
        use App\QuizJawab;
        $jumlah_soal_quiz = Quiz::count();
        $jawab_benar = QuizJawab::where('quiz_siswa_id',$quiz_siswa_id)->where('status','T')->count();

        $persen_benar = $jawab_benar * 100 / $jumlah_soal_quiz;

    @endphp
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
                <div class="col-md-12" style="padding-left: 200px; display:none;" id="quiz_jawab">
                    <div class="panel" style="max-width: 1000px;">
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
                        <div class="panel-heading">
                            <div class="col-md-6">
                            <h1 class="panel-title">Jawaban Kamu</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-warning navbar-btn-right" id="tutup">Tutup</a>
                            </div>

                        </div>
                        <div class="panel-body" style="margin-top: 10px;">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($quiz_jawab as $item)
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Soal No.  <?php  $i++;  echo $i; ?> </h3>




                                        <div class="subjudul"> Pertanyaan : </div>
                                        @if($item->quiz->foto != null)
                                        <div class="text-center">
                                            <img src="{{url('asset-quiz/'.$item->quiz->foto)}}" alt="" style="max-width: 200px; margin:auto;">
                                        </div>
                                        @endif
                                        <div class="isi"> {!!$item->quiz->pertanyaan!!}
                                            @if($item->status == 'T')
                                                <img src="{{asset('asset-quiz/check.png')}}" alt="" style="width: 20px;">
                                            @else
                                                <img src="{{asset('asset-quiz/incorrect.png')}}" alt="" style="width: 20px;">
                                            @endif
                                        </div>
                                        <div class="subjudul"> Pilihan : </div>
                                        <div class="isi">    A . {!!$item->quiz->pil_a!!}  <br>
                                            B . {!!$item->quiz->pil_b!!}  <br>
                                            C . {!!$item->quiz->pil_c!!}  <br>
                                            D . {!!$item->quiz->pil_d!!}  <br>
                                            E . {!!$item->quiz->pil_e!!} </div>
                                        <div class="subjudul"> Kunci Jawaban : {{$item->quiz->kunci}}</div>
                                </div>


                            </div>
                            <hr>
                            @endforeach

                        </div>
                    </div>
                </div>
				<div class="auth-box lockscreen clearfix" id="announcement">
					<div class="content">
						{{-- <h1 class="sr-only">Klorofil - Free Bootstrap dashboard</h1>
                        <div class="logo text-center"><img src="{{asset('assets_2/img/logo-dark.png')}}" alt="Klorofil Logo"></div> --}}
                        @if($persen_benar > 70)
                            <div class=" text-center">
                                <img src="{{asset('asset-quiz/perfect.gif')}}" class="img-circle" alt="Avatar" style="max-width: 200px;">
                                <h2 class="name">Sempurna</h2>
                            </div>
                            <div class="text-center">
                                Kamu menyelesaikan quiz dengan sempurna
                            </div>
                        @elseif($persen_benar >= 50 && $persen_benar <= 70)
                            <div class=" text-center">
                                <img src="{{asset('asset-quiz/good_job.gif')}}" class="img-circle" alt="Avatar" style="max-width: 200px;">
                                <h2 class="name">Bagus</h2>
                            </div>

                            <div class="text-center">
                                Kamu menyelesaikan quiz dengan baik
                            </div>
                        @else
                            <div class=" text-center">
                                <img src="{{asset('asset-quiz/good_job.gif')}}" class="img-circle" alt="Avatar" style="max-width: 200px;">
                                <h2 class="name">Coba Lagi</h2>
                            </div>
                            <div class="text-center">
                                Hasilmu masih belum baik, coba ulangi lagi ya :D
                            </div>
                        @endif
                        <div class="text-center" style="margin-top: 10px;">
                            <button class="btn btn-primary" id="lihat_hasil"> Lihat hasil </button>
                            <a href="{{route('home')}}" class="btn btn-primary">Dashboard</a>
                        </div>



					</div>
				</div>
			</div>
		</div>
    </div>

    <!-- END WRAPPER -->
    <script src="{{asset('assets_2/vendor/jquery/jquery-3.5.1.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#lihat_hasil").click(function (e) {
                e.preventDefault();
                $("#announcement").css('display', 'none');
                $("#quiz_jawab").fadeIn();
            });

            $("#tutup").click(function (e) {
                e.preventDefault();
                $("#quiz_jawab").fadeOut();
                $("#announcement").fadeIn();
            });
        });
    </script>
</body>

</html>
