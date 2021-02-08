@extends('layouts.master-dashboard-guru')
@section('title','Ebook')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- TABLE HOVER -->
@if(auth()->user()->role == 1)
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Data Ebook</h3>
        <a href="#" class="btn btn-primary navbar-btn-right" data-toggle="modal" data-target="#tambah_ebook">Tambah Ebook</a>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($ebook->count() != 0)
                @foreach ($ebook as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->penulis}}</td>
                    <td>{{$item->tahun}}</td>
                    <td class="text-center">
                        <a href="{{url('asset-ebook/'.$item->file)}}" class="btn btn-primary" target="__blank"> <i class="lnr lnr-download"></i> Download</a>
                        <a href="#" class="btn btn-warning edit-ebook" data-ebook_id="{{$item->id}}" data-judul="{{$item->judul}}" data-penulis="{{$item->penulis}}" data-tahun="{{$item->tahun}}" data-toggle="modal" data-target="#edit_ebook"> <i class="lnr lnr-edit"></i> Edit </a>
                        <a href="" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@elseif(auth()->user()->role == 2)

@endif
@endsection

@section('linkfooter')
    <!-- Modal Create Soal Quiz -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="tambah_ebook">
    <div class="modal-dialog modal-md-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Ebook</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('storeEbook')}}" enctype="multipart/form-data" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="judul" class="col-form-label">Judul Ebook</label>
                      <input class="form-control" type="text" name="judul" id="judul">
                    </div>
                    <div class="form-group">
                      <label for="penulis" class="col-form-label">Penulis</label>
                      <input class="form-control" type="text" name="penulis" id="penulis">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="tahun" class="col-form-label">Tahun </label>
                        <input class="form-control" name="tahun" id="tahun" type="number">
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-form-label">File </label>
                        <input type="file" name="file" class="form-control" id="file">
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

 <!-- Modal EDIT EBOOK -->
 <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_ebook">
    <div class="modal-dialog modal-md-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Edit Ebook</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updateEbook')}}" enctype="multipart/form-data" method="post">
          @csrf @method('PATCH')
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="judul" class="col-form-label">Judul Ebook</label>
                      <input type="hidden" value="" name="ebook_id_update" id="ebook_id_update">
                      <input class="form-control" type="text" name="judul_update" id="judul_update" value="">
                    </div>
                    <div class="form-group">
                      <label for="penulis" class="col-form-label">Penulis</label>
                      <input class="form-control" type="text" name="penulis_update" id="penulis_update" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="tahun" class="col-form-label">Tahun </label>
                        <input class="form-control" name="tahun_update" id="tahun_update" type="number" value="">
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-form-label">File </label>
                        <input type="file" name="file_update" class="form-control" id="file_update">
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

<script>
    $(document).ready(function () {
        $(".edit-ebook").click(function (e) {
        const judul      = $(this).data('judul')
        const ebook_id         = $(this).data('ebook_id');
        const penulis       = $(this).data('penulis');
        const tahun           = $(this).data('tahun');

        console.log(judul);
        console.log(ebook_id);
        console.log(penulis);
        console.log(tahun);
        $("#ebook_id_update").val(ebook_id);
        $("#penulis_update").val(penulis);
        $("#judul_update").val(judul);
        $("#tahun_update").val(tahun);

        });
    });

</script>

@if(Session::has('success-edit'))
<script>
    swal({
        title: "Berhasil",
        text: "Berhasil mengedit E-Book",
        icon: "success",
        button: "OK",
    });
</script>
@endif
@endsection


