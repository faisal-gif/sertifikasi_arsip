<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::latest()->get();
        return view('arsip.index', compact('arsips'));
    }
    public function cari(Request $request)
    {
        $arsips = Arsip::where('judul',$request->cari)->get();
        return view('arsip.index', compact('arsips'));
    }
    public function create()
    {
        return view('arsip.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'noSurat' => 'required|string|max:155',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);
        $fileName = time() . '.' . $request->file->extension();

        $upload = $request->file->move(public_path('uploads'), $fileName);

        $arsip = Arsip::create([
            'noSurat' => $request->noSurat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'file' => $fileName
        ]);

        if ($arsip) {
            return redirect()->route('arsip.index')->with(['success' => 'Data berhasil diarsipkan']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Data gagal diarsipkan']);
        }
    }
    public function showArsip($id)
    {
        $arsips = Arsip::where('noSurat', $id)->first();
        return view('arsip.show', compact('arsips'));
    }
    public function download($file)
    {
        return response()->download(public_path('uploads/' . $file));
    }
    public function delete($id)
    {
        $arsip = Arsip::where('noSurat', $id);
        $arsip->delete();
        return redirect()->route('arsip.index')->with(['success' => 'Arsip sudah dihapus']);
    }
}
