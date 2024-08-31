@extends('admin.layout.main')
@section('container')
<div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <form method="post" action="/dashboard/blog/{{ $blog->id }}">
        @method('put')
        @csrf

        <!-- Judul Blog -->
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Blog</label>
            <input type="text" name="judul_blog" id="judul"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('judul_blog') border-red-500 @enderror"
                value="{{ old('judul_blog', $blog->judul_blog) }}" required autofocus>
            @error('judul_blog')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Category Blog -->
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category Blog</label>
            <select name="category_id" id="category"
                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Isi Blog -->
        <div class="mb-6">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi Blog</label>
            @error('isi_blog')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input id="isi" type="hidden" name="isi_blog" value="{{ old('isi_blog', $blog->isi_blog) }}">
            <trix-editor input="isi" class="trix-content border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1"></trix-editor>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
