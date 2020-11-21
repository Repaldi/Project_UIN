@extends('layouts.master-dashboard-admin')
@section('content')    
<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
<!-- OVERVIEW -->
<div class="row">
	<div class="col-md-6">
<!-- TABLE STRIPED -->
<div class="panel">
<div class="panel-heading">
    <h3 class="panel-title">Tambahkan Guru</h3>
</div>
<div class="panel-body">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form  method="POST" class="register-form" action="{{ route('dataguruStore') }}"> 
                    @csrf
                    <input type="hidden" name="role" value="1">
                   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username"class="form-control" placeholder="Nama Pengguna">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email"class="form-control" placeholder="Alamat Email">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" name="password"class="form-control" placeholder="Kata Sandi">
                    </div>
                    <br>
            
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
</div>
</div>
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