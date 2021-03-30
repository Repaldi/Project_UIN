<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Latihan;
use App\LatihanSiswa;
use Illuminate\Http\Request;
use App\Pilgan;
use File;

class SoalController extends Controller
{
    public function getLatihan()
    {
        $pilgan = Pilgan::where('isdelete',false)->get();
        $latihan = Latihan::all();
        if (auth()->user()->role == 2) {
            $latihan_siswa = LatihanSiswa::where('user_id',auth()->user()->id)->get();
        }else {
            $latihan_siswa = null;
        }

        return view('guru/soal', compact(['pilgan','latihan','latihan_siswa']));
    }

    public function storeSoal(Request $request)
    {

        $this->validate($request,['foto' => 'nullable|file|image|mimes:png,jpg,jpeg,gif']);
        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/soal';
        $file->move($tujuan_upload,$nama_file);

        $pilgan = Pilgan::create([
            'poin' => 10,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'pil_e' => $request->pil_e,
            'kunci' => $request->kunci,
            'foto' => $nama_file,
        ]);
        return redirect()->back()
        ->with('success','Soal berhasil dibuat');
    }else{
        $nama_file = null;
        $pilgan = Pilgan::create([
            'poin' => 10,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'pil_e' => $request->pil_e,
            'foto' => $nama_file,
            'kunci' => $request->kunci,
        ]);
        return redirect()->back()
        ->with('success','Soal berhasil dibuat');
        }
    }


    public function updateSoal(Request $request){

        $pilgan     = Pilgan::findorFail($request->id);
        $nama_file= $pilgan->foto; //simpan nama file gambar yang sudah ada

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/soal';
        $file->move($tujuan_upload,$nama_file);
        File::delete('images/soal'.$pilgan->foto);
        }
            $update = [
                'poin' => 10,
                'pertanyaan' => $request->pertanyaan,
                'pil_a' => $request->pil_a,
                'pil_b' => $request->pil_b,
                'pil_c' => $request->pil_c,
                'pil_d' => $request->pil_d,
                'pil_e' => $request->pil_e,
                'foto' => $nama_file,
                'kunci' => $request->kunci,
            ];

            Pilgan::whereId($pilgan->id)->update($update);
            return redirect()->back()->with('success','Soal berhasil diupdate !');

    }


}
