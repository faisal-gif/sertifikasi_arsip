@extends('layouts.layout')
@section('isi')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- Notifikasi menggunakan flash session data -->
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
                    <h3>Arsip Surat >> Edit Surat</h3>
                    <p>Edit surat yang telah terbit pada form ini untuk diarsipkan
                        </br>
                        Catatan :
                    <ul>
                        <li>Gunakan file berformat PDF</li>
                    </ul>
                    </p>
                    </br>
                    </br>
                    <form action="{{ route('arsip.update', $arsips->noSurat) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="noSurat" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('noSurat') is-invalid @enderror" name="noSurat" value="{{$arsips->noSurat}}">

                                <!-- error message untuk title -->
                                @error('noSurat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-4">
                                <select name="kategori" class="form-control" required>
                                    <option value="Undangan" {{ $arsips->kategori == 'Undangan' ? 'selected' : '' }}>Undangan</option>
                                    <option value="Pengumuman" {{ $arsips->kategori == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="Nota Dinas" {{ $arsips->kategori == 'Nota Dinas' ? 'selected' : '' }}>Nota Dinas</option>
                                    <option value="Pemberitahuan" {{ $arsips->kategori == 'Pemberitahuan' ? 'selected' : '' }}>Pemberitahuan</option>
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$arsips->judul}}" required>

                                <!-- error message untuk content -->
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="upload" class="col-sm-2 col-form-label">File Surat(PDF)</label>
                            <div class="col-sm-4">

                                <input class="form-control-file" type="file" id="file" name="file">

                            </div>
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        </br>
                        </br>
                        <a href="{{ route('arsip.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection