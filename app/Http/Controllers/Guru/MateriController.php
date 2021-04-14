<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Materi;
use Alert;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi()
    {
        $materi = Materi::paginate(10);
        return view('getMateri',compact(['materi']));
    }

    public function showMateri($id)
    {
        $materi = Materi::find($id);

        return view('materi',compact('materi'));
    }

    public function storeMateriBaru(Request $request)
    {
        $request->validate([
            'judul_materi' => 'required'
        ]);

        $materi = Materi::create([
            'judul_materi'=>$request->judul_materi
        ]);

        return redirect()->route('showMateri',$materi->id);
    }

    public function storeMateri(Request $request)
    {
      $request->validate([
        'video' =>'mimes:mp4,3gp,mkv,api,fla,mpg,mpeg,mov',
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

      Alert::success('Berhasil Membuat materi');
      return redirect()->back();
    }

    public function updateMateri(Request $request)
    {
      $materi = Materi::find($request->materi_id);
      $request->validate([
        'judul_materi' => 'required',
        'video' =>'mimes:mp4,3gp,mkv,api,fla,mpg,mpeg',
        'materi' => 'required'
      ]);

      if($request->hasFile('video')) {
        $video = $request->file('video');
        $nama_video = time()."_".$video->getClientOriginalName();
        $tujuan_upload = 'asset-materi';
        $video->move($tujuan_upload,$nama_video);

        $materi->update([
            'judul_materi'=>$request->judul_materi,
            'video' => $nama_video,
            'materi' => $request->materi
        ]);

      }else {
        $materi->update([
            'judul_materi'=>$request->judul_materi,
          'materi'=> $request->materi
        ]);
      }
      return redirect()->back()->with('success','Text');
;
    }
   
    public function deleteMateri($id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        return back()->with('success_delete','Berhasil Menghapus Materi');
    }
   
}
