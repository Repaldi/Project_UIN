<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Latihan;
use App\LatihanJawab;
use App\LatihanSiswa;
use App\Pilgan;
use App\User;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function getLatihanSiswaPerLatihan($id)
    {
        $latihan_siswa = LatihanSiswa::where('latihan_id',$id)->get();
        // dd($latihan_siswa);
        return view('guru.latihan',compact('latihan_siswa'));
    }

    public function showHasilLatihan($id)
    {
        // $soal = Pilgan::all();
        $latihan_siswa = LatihanSiswa::whereId($id)->first();
        $user = $latihan_siswa->user;
        // dd($user);
        $latihan_jawab = LatihanJawab::where('latihan_siswa_id',$latihan_siswa->id)->get();
        return view('guru.showLatihan',compact(['latihan_siswa','latihan_jawab','user']));
    }

    public function storeLatihan(Request $request)
    {
        $request->validate([
            'nama_latihan' => 'required'
        ]);

        $latihan = Latihan::create([
            'nama_latihan' => $request->nama_latihan
        ]);

        $siswas = User::where('role',2)->get();

        foreach ($siswas as $key => $siswa) {
            $data['user_id'] = $siswa->id;
            $data['latihan_id'] = $latihan->id;

            LatihanSiswa::create($data);
        }




        return redirect()->back()->with('success-create','Text');
    }

    public function deleteLatihan($id)
    {
        $latihan = Latihan::find($id);
        $latihan->delete();
        return redirect()->back();
    }
}
