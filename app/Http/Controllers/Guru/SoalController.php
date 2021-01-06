<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pilgan;

class SoalController extends Controller
{
    public function index()
    {
        $pilgan = Pilgan::all();
        return view('guru/soal', compact('pilgan')); 
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
            'poin' => $request->poin,
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
        $pilgan = Pilgan::create([
            'poin' => $request->poin,
            'pertanyaan' => $request->pertanyaan,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'pil_e' => $request->pil_e,
            'foto' => '',
            'kunci' => $request->kunci,
        ]);
        return redirect()->back()
        ->with('success','Soal berhasil dibuat');
        }

     
       
    }
           
}
