<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Auth;
use App\Pilgan;
use App\LatihanJawab;
use App\LatihanSiswa;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function createLatihan(Request $request)
    {
        $latihan_siswa = LatihanSiswa::create([
            'user_id'=> auth()->user()->id

        ]);

        $latihan_siswa_id = $latihan_siswa->id;
        $soal_latihan = Pilgan::paginate(1);

        return redirect()->route('getLatihanSiswa',$latihan_siswa_id);
        // return view('siswa.latihan',compact(['latihan_siswa_id']));
    }

    public function getLatihanSiswa($latihan_siswa_id)
    {

        $soal_latihan = Pilgan::orderBy('id','asc')->paginate(1);
        $latihan_siswa_id = $latihan_siswa_id;
        return view('siswa.latihan',compact(['soal_latihan','latihan_siswa_id']));

    }

    public function fetch_data_latihan(Request $request)
    {

        $latihan_siswa_id = $request->latihan_siswa_id;
        $soal_latihan = Pilgan::orderBy('id','asc')->paginate(1);
        if($request->ajax())
        {
            // return $soal_latihan;
            return view('siswa.latihan_data',['soal_latihan'=>$soal_latihan,'latihan_siswa_id'=>$latihan_siswa_id])->render();
        }
    }

    public function jawabLatihan(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'latihan_siswa_id' => 'required',
            'soal_latihan_id' => 'required',
            'jawab_latihan' => 'required',
            'status' => 'required',
        ]);
        $check_jawaban = LatihanJawab::where('user_id', Auth::user()->id)
                                    ->where('pilgan_id', $request->soal_latihan_id)
                                    ->where('latihan_siswa_id', $request->latihan_siswa_id)->first();
        if (!$check_jawaban) {
            $posts = LatihanJawab::create([
                'user_id' => $request->user_id,
                'latihan_siswa_id' => $request->latihan_siswa_id,
                'pilgan_id' => $request->soal_latihan_id,
                'jawaban' => $request->jawab_latihan,
                'status' => $request->status
            ]);
            return response()->json($posts);

        } elseif ($check_jawaban) {
            $update_latihan_jawab = [
                'user_id' => $request->user_id,
                'latihan_siswa_id' => $request->latihan_siswa_id,
                'pilgan_id' => $request->soal_latihan_id,
                'jawaban' => $request->jawab_latihan,
                'status' => $request->status
            ];
            $check_jawaban->update($update_latihan_jawab);
            return response()->json($update_latihan_jawab);
        }



    }

    public function checkLatihan(Request $request)
    {
        $hitung_jawaban = LatihanJawab::where('latihan_siswa_id',$request->latihan_siswa_id)->count();
        $hitung_latihan  = Pilgan::count();
        if ($hitung_jawaban == $hitung_latihan) {
            $pesan = "Kamu telah menyelesaikan latihan";
            return response()->json([
                'pesan' => $pesan,
                'isComplete'=> true
            ]);
        }else {
            $pesan = "Kamu belum menjawab semua soal latihannya";
            return response()->json([
                'pesan' => $pesan,
                'latihan_siswa_id' => $request->latihan_siswa_id,
                'isComplete' => false
            ]);
        }
    }

    public function finishLatihan($latihan_siswa_id)
    {
        $latihan_siswa = LatihanSiswa::find($latihan_siswa_id);
        $latihan_siswa->update([
            'status' => true
        ]);
        return view('siswa.index')->with('success','Anda telah selesai mengerjakan latihan');;
    }
}
