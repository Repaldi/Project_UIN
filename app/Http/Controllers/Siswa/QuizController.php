<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Auth;
use App\Quiz;
use App\QuizJawab;
use App\QuizSiswa;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function createQuiz(Request $request)
    {
        $quiz_siswa = QuizSiswa::create([
            'user_id'=> auth()->user()->id

        ]);

        $quiz_siswa_id = $quiz_siswa->id;
        $soal_quiz = Quiz::paginate(1);

        return redirect()->route('getQuizSiswa',$quiz_siswa_id);
        // return view('siswa.quiz',compact(['quiz_siswa','soal_quiz']));
    }

    public function getQuizSiswa($quiz_siswa_id)
    {

        $soal_quiz = Quiz::orderBy('id','asc')->paginate(1);
        $quiz_siswa_id = $quiz_siswa_id;
        return view('siswa.quiz',compact(['soal_quiz','quiz_siswa_id']));
    }

    public function fetch_data(Request $request)
    {
        // $peserta = Peserta::find($request->peserta_id);
        // $ujian = Ujian::where('id',$peserta->ujian_id)->first();
        // $paket_soal_id = $ujian->paket_soal_id;
        // $paket_soal = PaketSoal::where('id',$paket_soal_id)->get();
        $quiz_siswa_id = $request->quiz_siswa_id;
        $soal_quiz = Quiz::orderBy('id','asc')->paginate(1);
        if($request->ajax())
        {
            // return $soal_quiz;
            return view('siswa.pagination_data',['soal_quiz'=>$soal_quiz,'quiz_siswa_id'=>$quiz_siswa_id])->render();
        }
    }

    public function jawabQuiz(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'quiz_siswa_id' => 'required',
            'soal_quiz_id' => 'required',
            'jawab_quiz' => 'required',
            'status' => 'required',
        ]);
        $check_jawaban = QuizJawab::where('user_id', Auth::user()->id)
                                    ->where('quiz_id', $request->soal_quiz_id)
                                    ->where('quiz_siswa_id', $request->quiz_siswa_id)->first();
        if (!$check_jawaban) {
            $posts = QuizJawab::create([
                'user_id' => $request->user_id,
                'quiz_siswa_id' => $request->quiz_siswa_id,
                'quiz_id' => $request->soal_quiz_id,
                'jawaban' => $request->jawab_quiz,
                'status' => $request->status
            ]);
            return response()->json($posts);

        } elseif ($check_jawaban) {
            $update_quiz_jawab = [
                'user_id' => $request->user_id,
                'quiz_siswa_id' => $request->quiz_siswa_id,
                'quiz_id' => $request->soal_quiz_id,
                'jawaban' => $request->jawab_quiz,
                'status' => $request->status
            ];
            $check_jawaban->update($update_quiz_jawab);
            return response()->json($update_quiz_jawab);
        }



    }

    public function checkQuiz(Request $request)
    {
        $hitung_jawaban = QuizJawab::where('quiz_siswa_id',$request->quiz_siswa_id)->count();
        $hitung_quiz  = Quiz::count();
        if ($hitung_jawaban == $hitung_quiz) {
            $pesan = "Kamu telah menyelesaikan quiz";
            return response()->json([
                'pesan' => $pesan,
                'isComplete'=> true
            ]);
        }else {
            $pesan = "Kamu belum menjawab semua quiz nya";
            return response()->json([
                'pesan' => $pesan,
                'isComplete' => false
            ]);
        }
    }

    public function finishQuiz($quiz_siswa_id)
    {
        $quiz_jawab = QuizJawab::where('quiz_siswa_id',$quiz_siswa_id)->get();
        return view('siswa.finish_quiz',compact(['quiz_jawab','quiz_siswa_id']));
    }
}
