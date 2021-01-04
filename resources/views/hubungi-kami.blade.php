@extends('layouts.master-front')

@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Hubungi Kami</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
</div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Beranda</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Hubungi Kami</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">Nama Depan</label>
                    <input type="text" id="fname" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Nama Belakang</label>
                    <input type="text" id="lname" class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="eaddress">Email</label>
                    <input type="text" id="eaddress" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                    <label for="tel">Nomor HP</label>
                    <input type="text" id="tel" class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Pesan</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Kirim" class="btn btn-primary btn-lg px-5">
                </div>
            </div>
        </div>
    </div>

@stop
