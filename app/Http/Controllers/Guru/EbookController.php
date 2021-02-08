<?php

namespace App\Http\Controllers\Guru;

use App\Ebook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use RealRashid\SweetAlert\Facades\Alert;
use Alert;

class EbookController extends Controller
{
    public function getEbook()
    {
        $ebook = Ebook::all();
        return view('ebook',compact(['ebook']));
    }

    public function storeEbook(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required',
            'file' => 'required|file|mimes:docx,pdf'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'asset-ebook';
            $file->move($tujuan_upload,$nama_file);
        }else {
            $nama_file = null;
        }

        Ebook::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun,
            'file' => $nama_file
        ]);

        Alert::success('Berhasil','Berhasil menambah E-Book baru');
        return redirect()->back();
    }

    public function updateEbook(Request $request)
    {
        $request->validate([
            'judul_update' => 'required',
            'penulis_update' => 'required',
            'tahun_update' => 'required',
            'file_update' => 'file|mimes:docx,pdf'
        ]);

        $ebook = Ebook::find($request->ebook_id_update);

        if ($request->hasFile('file_update')) {
            $file = $request->file('file_update');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'asset-ebook';
            $file->move($tujuan_upload,$nama_file);
        }else {
            $nama_file = $ebook->file;
        }

        $ebook->update([
            'judul' => $request->judul_update,
            'penulis' => $request->penulis_update,
            'tahun' => $request->tahun_update,
            'file' => $nama_file
        ]);

        return redirect()->back()->with('success-edit','Text');
    }

    public function deleteEbook($id)
    {
        $ebook = Ebook::find($id);
        $ebook->delete();

        return redirect()->back();
    }
}
