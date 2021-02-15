@extends('layouts.master-front')

@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Tentang</h2>
            </div>
          </div>
        </div>
</div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Beranda</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Tentang</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">

        <div class="row">
              <div class="col-lg-4">
                <h2 class="section-title-underline">
                  <span> Biodata </span>
                </h2>
              </div>
              <div class="col-lg-4">
              <img src="{{url('images/sundari.jpeg')}}" width="200px">
               
              </div>
              <div class="col-lg-4">
              <p>
                Nama		: Sundari Fadhila<br/>
                Nim		: 206172936<br/>
                TTL		: Kerinci, 01 Oktober 1999<br/>
                Alamat		: Desa Permai Indah, Kec.Koto Baru,
                Kota Sungai Penuh, Provinsi Jambi<br/>
                Email		: Sundari Fadhila36@gmail.com
</p>
              </div>
        </div>
         

        </div>
    </div>
    <div class="site-section">
        <div class="container">
        <div class="row">
              <div class="col-lg-4">
                <h2 class="section-title-underline">
                  <span> Tentang Aplikasi </span>
                </h2>
              </div>
              <div class="col-lg-8">
             Aplikasi ini merupakan media pembelajaran fisika berbasis web pada pokok bahasan momentum dan impuls untuk siswa sekolah menengah atas negeri 3 Sungai Penuh
              
              </div>
        </div>
         

        </div>
    </div>

@stop
