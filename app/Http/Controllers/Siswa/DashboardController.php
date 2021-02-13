<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Siswa;
use File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa/index'); 
    }
    public function profilSiswa()
    {
        return view('siswa/profil'); 
    }
    public function storeProfilSiswa(Request $request)
    {
      $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'nomor_induk' => 'required',
            'jk' => 'required',
            'foto' => 'nullable|file|image|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);

        $profil = Siswa::create([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jk' => $request->jk,
            'foto' => $nama_file,
        ]);
        return redirect()->back()
        ->with('success','Data Profil berhasil di simpan');
    }

    public function updateProfilSiswa(Request $request){
        $siswa= Siswa::findorFail($request->id);
        $nama_file= $siswa->foto; //simpan nama file gambar yang sudah ada

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);
        File::delete('images'.$siswa->foto);
        }
            $update = [
                'nama_lengkap' => $request->nama_lengkap,
                'nomor_induk' => $request->nomor_induk,
                'jk' => $request->jk,
                'foto' => $nama_file,
            ];
      
            Siswa::whereId($siswa->id)->update($update);
            return redirect()->back()->with('success','Profil berhasil diupdate !');   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
