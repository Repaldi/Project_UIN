<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Materi;
Use Alert;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi()
    {
      $materi = Materi::first();

      return view('materi',compact('materi'));
    }

    public function storeMateri(Request $request)
    {
      $request->validate([
        'gambar'=>'required',
        'video' =>'required|mimes:mp4,3gp,mkv,api,fla,mpg,mpeg',
        'materi' => 'required'
      ]);

      if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $gambar->move($tujuan_upload,$nama_gambar);
      }

      if ($request->hasFile('video')) {
        $video = $request->file('video');
        $nama_video = time()."_".$video->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $video->move($tujuan_upload,$nama_video);
      }

      Materi::create([
        'gambar' => $nama_gambar,
        'video' => $nama_video,
        'materi' =>$request->materi
      ]);

      return "oke";
    }

    public function updateMateri(Request $request)
    {
      $materi = Materi::first();
      $request->validate([
        'gambar'=>'mimes:jpeg,jpg,png,gif',
        'video' =>'mimes:mp4,3gp,mkv,api,fla,mpg,mpeg',
        'materi' => 'required'
      ]);

      if ($request->hasFile('gambar') && $request->hasFile('video')) {
        $gambar = $request->file('gambar');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $gambar->move($tujuan_upload,$nama_gambar);

        $video = $request->file('video');
        $nama_video = time()."_".$video->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $video->move($tujuan_upload,$nama_video);

        $materi->update([
          'gambar' => $nama_gambar,
          'video' => $nama_video,
          'materi'=> $request->materi
        ]);
      }elseif ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $gambar->move($tujuan_upload,$nama_gambar);

        $materi->update([
          'gambar' => $nama_gambar,
          'materi'=> $request->materi
        ]);
      }elseif ($request->hasFile('video')) {
        $video = $request->file('video');
        $nama_video = time()."_".$video->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $video->move($tujuan_upload,$nama_video);

        $materi->update([
          'video' => $nama_video,
          'materi' => $request->materi
        ]);

      }else {
        $materi->update([
          'materi'=> $request->materi
        ]);
      }
      Alert::success('Berhasil Mengupdate');
      return redirect()->back();
;
    }
}
