@extends('admin.layout.main')
@section('container')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <form method="post" action="/dashboard/blog">
        @csrf
        <div class="mb-5">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Blog</label>
            <input type="text" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('judul_blog') border-red-500 @enderror"
                name="judul_blog" id="judul" required autofocus value="">
            @error('judul_blog')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="category" class="block text-gray-700 font-bold mb-2">Category Blog</label>
            <select class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                name="category_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="isi" class="block text-gray-700 font-bold mb-2">Isi Blog</label>
            <input id="isi" type="hidden" name="isi_blog" value="">
            <trix-editor input="isi" class="trix-content w-full h-40 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></trix-editor>
            @error('isi_blog')
                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3 rounded-md hover:bg-blue-600 transition duration-300">
            Submit
        </button>
    </form>
</div>
@endsection
