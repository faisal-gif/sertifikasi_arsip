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
                    <form action="{{ route('arsip.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="noSurat">No Surat</label>
                            <input type="text" class="form-control" name="noSurat" value="{{ old('noSurat', $arsip->noSurat) }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="noSurat">No Surat</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" required>

                            <!-- error message untuk title -->
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Publish Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $post->status == 1 ? 'selected':'' }}>Publish</option>
                                <option value="0" {{ $post->status == 0 ? 'selected':'' }}>Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5" required>{{ old('content', $post->content) }}</textarea>

                            <!-- error message untuk content -->
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                        <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection