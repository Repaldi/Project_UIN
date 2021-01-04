<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function tentang()
    {
        return view('tentang');
    }
    public function hubungiKami()
    {
        return view('hubungi-kami');
    }
}
