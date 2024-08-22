@extends('dashboard.layouts.main')
@section('container')
    <div class="col-lg-8">
        <form method="post" action="/dashboard/blog/{{ $blog->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Blog</label>
                <input type="text" class="form-control @error('judul_blog') is-invalid @enderror" name="judul_blog"
                    id="judul" required autofocus value="{{ old('judul_blog', $blog->judul_blog) }}">
                @error('judul_blog')
                    <div class="invalid-feedback text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category Blog</label>
                <select class="form-select " name="category_id" required autofocus>
                    @foreach ($categories as $category)
                        @if (old('category_id', $blog->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Blog</label>

                @error('isi_blog')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input id="isi" type="hidden" name="isi_blog" value="{{ old('isi_blog', $blog->isi_blog )}}">
                <trix-editor input="isi"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
