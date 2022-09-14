@extends('layouts.layout')
@section('isi')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">


            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h3>Arsip Surat</h3>
                    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkakn
                        </br>
                        Klik "Lihat" pada kolom aksi untuk menampilkan surat.
                    </p>
                    </br>

                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th scope="col">No Surat</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal Post</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($arsips as $a)
                            <tr>
                                <td>{{ $a->noSurat }}</td>
                                <td>{{ $a->kategori }}</td>
                                <td>{{ $a->judul }}</td>
                                <td>{{ $a->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Tidak ada surat yang di arsipkan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('arsip.create') }}" class="btn btn-md btn-success mb-3 float-left">Arsipkan Surat</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection