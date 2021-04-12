<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Forum;
use App\ForumJawab;

class ForumController extends Controller
{
    public function forum()
    {
        $forum= Forum::paginate(10);
        return view('forum',compact('forum'));
    }

    public function storeForum(Request $request)
    {
    $forum = Forum::create([
        'user_id' => auth()->user()->id,
        'topik' => $request->topik,
        'isi_pesan' => $request->isi_pesan,
        'status' => $request->status,

    ]);
    return redirect()->back()->with('success','Pesan Berhasil di Kirim');
    }

    public function showForum($id, Request $request)
    {
        
        $forum = Forum::whereId($id)->first();
        $topik = $forum->topik;
        $forum_id = $forum->id;
        $forum_jawab = ForumJawab::where('forum_id', $forum_id)->get();
        return view('bukaforum',compact(['forum','topik','forum_jawab']));
    }

    public function storeForumJawab(Request $request)
    {
    $forum_jawab = ForumJawab::create([
        'user_id' => auth()->user()->id,
        'forum_id' => $request->forum_id,
        'isi_pesan' => $request->isi_pesan,
        'status' => $request->status,

    ]);
    return redirect()->back()->with('success','Pesan Berhasil di Kirim');
    }

    public function deleteForum($id)
    {
        $forum = Forum::find($id);
        $forum->delete();

        return redirect()->back();
    }
}
