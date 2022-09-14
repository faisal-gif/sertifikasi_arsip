@extends('layouts.layout')
@section('isi')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h3>Arsip Surat >> Lihat</h3>

                    <p>
                    <ul>
                        <li>No Surat : {{$arsips->noSurat}}</li>
                        <li>Kategori : {{$arsips->kategori}}</li>
                        <li>Judul : {{$arsips->judul}}</li>
                        <li>Waktu Uanggah : {{$arsips->created_at}}</li>
                    </ul>
                    </p>
                    <iframe src="{{asset('uploads/'.$arsips->file) }}" align="top" height="500" width="100%" frameborder="0" scrolling="auto"></iframe>
                    <br>
                    <br>
                    <a href="{{ route('arsip.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    <a href="{!! route('download', $arsips->file) !!}" class="btn btn-sm btn-warning">Unduh</a>
                    <a href="#" class="btn btn-sm btn-secondary">Edit/Ganti File</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection