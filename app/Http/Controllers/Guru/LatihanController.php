<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\LatihanJawab;
use App\LatihanSiswa;
use App\Pilgan;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function getLatihan()
    {
        $latihan_siswa = LatihanSiswa::all();
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
}
