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
            'file' => 'required|mimes:pdf,xlx,csv|max:2048'
        ]);
        $fileName = time() . '.' . $request->file->extension();

        $upload = $request->file->move(public_path('uploads'), $fileName);

        $arsip = Arsip::create([
            'noSurat' => $request->noSurat,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'slug' => $upload
        ]);

        if ($arsip) {
            return redirect()
                ->route('arsip.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
