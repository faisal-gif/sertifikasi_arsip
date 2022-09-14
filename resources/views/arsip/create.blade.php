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
                    <h3>Arsip Surat >> Unggah</h3>
                    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan
                        </br>
                        Catatan :
                    <ul>
                        <li>Gunakan file berformat PDF</li>
                    </ul>
                    </p>
                    </br>
                    </br>
                    <form action="{{ route('arsip.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="noSurat" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control @error('noSurat') is-invalid @enderror" name="noSurat" value="{{ old('noSurat') }}" required>

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
                                <select name="status" class="form-control" required>
                                    <option value="1" selected>Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required>

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
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile">
                                    <label class="custom-file-label" for="inputGroupFile" aria-describedby="inputGroupFileAddon">Choose image</label>
                                </div>

                            </div>
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