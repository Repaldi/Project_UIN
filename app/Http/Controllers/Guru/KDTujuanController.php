<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\KDTujuan;
use Illuminate\Http\Request;

class KDTujuanController extends Controller
{
    public function index()
    {
        $kdtujuan = KDTujuan::first();
        return view('kdtujuan',compact('kdtujuan'));
    }

    public function storeKDTujuan(Request $request)
    {
        $request->validate([
            'kd'=>'required',
            'tujuan'=>'required'
        ]);

        $kdtujuan = KDTujuan::first();

        if ($kdtujuan) {
            $kdtujuan->update([
                'kd'=>$request->kd,
                'tujuan' => $request->tujuan
            ]);
        }else {
            KDTujuan::create([
                'kd' => $request->kd,
                'tujuan' => $request->tujuan
            ]);
        }

        return redirect()->back();
    }
}
