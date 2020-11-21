<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 0){
            return view('admin/index');
        }elseif (Auth::user()->role == 1) {
            return view('guru/index');
        }else{
                return view('siswa/index'); 
             }
    }
    public function logout()
    {
      auth()->logout();

      return redirect()->route('login')->with('alert','Anda tidak boleh memasuki halaman tersebut');//->route('login')
    }
}
