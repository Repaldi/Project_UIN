<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Quiz;
use Alert;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
      $quiz = Quiz::all();
      return view('guru.quiz',compact(['quiz']));
    }

    public function storeSoalQuiz(Request $request)
    {
      $hitung = Quiz::count();
      if ($hitung >=10) {
        Alert::warning('Tidak Bisa', 'Soal sudah mencapai 10. Tidak bisa ditambah lagi');
        return redirect()->back()->with('error','Text');
      }
      $request->validate([
        'pertanyaan'=>'required',
        'pil_a'=>'required',
        'pil_b'=>'required',
        'pil_c'=>'required',
        'pil_d'=>'required',
        'pil_e'=>'required',

      ]);

      if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'asset-quiz';
        $file->move($tujuan_upload,$nama_file);
      }else {
        $nama_file = null;
      }

      $soal = Quiz::create([
        'pertanyaan' => $request->pertanyaan,
        'pil_a' => $request->pil_a,
        'pil_b' => $request->pil_b,
        'pil_c' => $request->pil_c,
        'pil_d' => $request->pil_d,
        'pil_e' => $request->pil_e,
        'foto'=> $nama_file,
        'kunci'=>$request->kunci
      ]);

      return redirect()->back()->with('success-add','Text');
    }

    public function updateSoalQuiz(Request $request)
    {
      $request->validate([
        'pertanyaan'=>'required',
        'pil_a'=>'required',
        'pil_b'=>'required',
        'pil_c'=>'required',
        'pil_d'=>'required',
        'pil_e'=>'required',
        'kunci' => 'required'
      ]);

      if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'asset-quiz';
        $file->move($tujuan_upload,$nama_file);
      }else {
        $nama_file = null;
      }

      $quiz = Quiz::find($request->soal_quiz_id);
      $quiz->update([
        'pertanyaan' => $request->pertanyaan,
        'pil_a' => $request->pil_a,
        'pil_b' => $request->pil_b,
        'pil_c' => $request->pil_c,
        'pil_d' => $request->pil_d,
        'pil_e' => $request->pil_e,
        'foto'=> $nama_file,
        'kunci'=>$request->kunci
      ]);

      Alert::success("Berhasil mengubah soal");
      return redirect()->back();
    }
}
