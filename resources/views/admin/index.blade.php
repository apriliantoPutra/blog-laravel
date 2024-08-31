@extends('admin.layout.main')
@section('container')
<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Total Blog</h2>
        <p class="text-2xl mt-2">{{ $totalBlog }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Total Users</h2>
        <p class="text-2xl mt-2">{{ $totalUser }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Total Author</h2>
        <p class="text-2xl mt-2">{{ $totalAuthor }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Active Users</h2>
        <p class="text-2xl mt-2">20</p>
    </div>
</div>

<!-- Latest Products -->
<h2 class="text-xl font-bold mt-8">Latest Blog</h2>
<div class="bg-white p-6 rounded-lg shadow-md mt-4">
    <ul>
        @foreach ($data as $blog)
        <li class="border-b py-2">{{ $blog->judul_blog }} -By {{ $blog->user->name }}</li>
        @endforeach

    </ul>
</div>
@endsection
