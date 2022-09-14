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

                    <form action="{{ route('cari') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                           
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="cari" value="{{ old('cari') }}" required placeholder="cari berdasarakan judul...">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                        </div>
                    </form>
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
                                    <a href="{{ route('lihat',$a->noSurat) }}" class="btn btn-sm btn-primary">Lihat</a>
                                    <a href="{!! route('download', $a->file) !!}" class="btn btn-sm btn-warning">Unduh</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus{{$a->noSurat}}">
                                        Hapus
                                    </button>

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
@foreach($arsips as $a)
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="hapus{{$a->noSurat}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus arsip surat ini ?
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{ route('delete',$a->noSurat) }}" class="btn btn-danger">Iya</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection