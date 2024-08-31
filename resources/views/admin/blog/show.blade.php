@extends('admin.layout.main')
@section('container')

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="container mx-auto px-4 lg:px-8">
        <article class="max-w-4xl mx-auto">
            <header class="mb-8">
                <div class="flex items-center space-x-4 mb-6">
                    <a href="/dashboard/blog" class="flex items-center justify-center px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-md transition">
                        <span class="mr-2" data-feather="arrow-left"></span>
                        <span>Back to Blog</span>
                    </a>
                    <a href="/dashboard/blog/{{ $blog->id }}/edit" class="flex items-center justify-center px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-md transition">
                        <span class="mr-2" data-feather="edit"></span>
                        <span>Edit</span>
                    </a>
                    <form action="/dashboard/blog/{{ $blog->id }}" method="post" class="inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="flex items-center justify-center px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-md transition" onclick="return confirm('Are You Sure?')">
                            <span class="mr-2" data-feather="trash"></span>
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white leading-tight">
                    {{ $blog->judul_blog }}
                </h1>
            </header>
            <div class="prose dark:prose-invert">
                {!! $blog->isi_blog !!}
            </div>
        </article>
    </div>
</main>
@endsection
