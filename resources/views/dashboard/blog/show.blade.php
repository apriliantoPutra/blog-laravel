@extends('dashboard.layouts.main')
@section('container')

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article
            class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
                    <a href="/dashboard/blog" class="btn btn-success d-flex flex-column align-items-center me-2">
                        <span class="me-2" data-feather="arrow-left"></span>
                        <span>Back to Blog</span>
                    </a>
                    <a href="/dashboard/blog/{{ $blog->id }}/edit" class="btn btn-warning d-flex flex-column align-items-center me-2">
                        <span class="me-2" data-feather="edit"></span>
                        <span>Edit</span>
                    </a>
                    <form action="/dashboard/blog/{{ $blog->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger d-flex flex-column align-items-center" onclick="return confirm('Are You Sure?')">
                            <span class="me-2" data-feather="trash"></span>
                            <span>Delete</span>
                        </button>
                    </form>
                </div>



                <h1
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $blog->judul_blog }}</h1>
            </header>
            <p>{!! $blog->isi_blog !!}</p>
        </article>
    </div>
</main>
@endsection
