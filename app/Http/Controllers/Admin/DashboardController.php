<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index'); 
    }
    public function profilAdmin()
    {
        return view('admin/profil'); 
    }

    // BAGIAN KELOLA AKUN GURU
    public function createGuru()
    {
        return view('admin.data-guru-create');
    }

    public function storeGuru(Request $request)
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
        $guru = User::where('role',1)->get();
        return redirect()->route('dataGuru',compact('guru'));
    }

    public function dataGuru()
    {
        $guru = User::where('id','>=',1)->where('role',1)->get();
        return view('admin.data-guru', compact('guru'));
    }

     //BAGIAN KELOLA AKUN SISWA
     public function createSiswa()
     {
         return view('admin.data-siswa-create');
     }
     public function storeSiswa(Request $request)
     {
         User::create([
             'username' => $request->username,
             'email' => $request->email,
             'role' => $request->role,
             'password' => bcrypt($request->password),
         ]);
         $siswa = User::where('role',2)->get();
         return redirect()->route('dataSiswa', compact('siswa'));
     }
     public function dataSiswa()
     {
         $siswa = User::where('id','>=',1)->where('role',2)->get();
         return view('admin.data-siswa', compact('siswa'));
     }
 

}
