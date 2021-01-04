<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Petunjuk;
use Illuminate\Http\Request;

class PetunjukController extends Controller
{
    public function index()
    {
        $petunjuk = Petunjuk::first();

        return view('petunjuk',compact('petunjuk'));
    }

    public function storePetunjuk(Request $request)
    {
        $request->validate([
            'petunjuk'=>'required'
        ]);

        $petunjuk = Petunjuk::first();

        if ($petunjuk) {
            $petunjuk->update([
                'petunjuk'=>$request->petunjuk
            ]);
        }else {
            Petunjuk::create([
                'petunjuk' => $request->petunjuk
            ]);
        }

        return redirect()->back();
    }
}
