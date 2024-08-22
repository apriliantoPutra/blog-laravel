@extends('dashboard.layouts.main')
{{-- untuk isi main --}}
@section('container')
    {{-- alert --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="/dashboard/categories" method="POST" class="mb-5">
        @csrf
        {{-- Name Input --}}
        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Category</label>
            <input type="text" name="name" id="category"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        {{-- Select Input --}}
        <div class="mb-4">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your color</label>
            <select id="color" name="color"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="blue">Blue</option>
                <option value="yellow" >Yellow</option>
                <option value="green">Green</option>
                <option value="red">Red</option>
                <option value="orange">Orange</option>
                <option value="pink">Pink</option>
            </select>
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="w-full sm:w-auto px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Category
        </button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Slug</th>
                <th scope="col">Category Color</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <th>{{ $category->slug }}</th>
                    <th>{{ $category->color }}</th>
                    <td>


                        <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span
                                    data-feather="trash"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
