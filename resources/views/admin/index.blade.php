@extends('admin.layout.main')
@section('container')
<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Total Products</h2>
        <p class="text-2xl mt-2">12</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Total Users</h2>
        <p class="text-2xl mt-2">34</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Active Products</h2>
        <p class="text-2xl mt-2">8</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold">Active Users</h2>
        <p class="text-2xl mt-2">20</p>
    </div>
</div>

<!-- Latest Products -->
<h2 class="text-xl font-bold mt-8">Latest Products</h2>
<div class="bg-white p-6 rounded-lg shadow-md mt-4">
    <ul>
        <li class="border-b py-2">Product 1 - $19.99</li>
        <li class="border-b py-2">Product 2 - $29.99</li>
        <li class="border-b py-2">Product 3 - $39.99</li>
        <li class="border-b py-2">Product 4 - $49.99</li>
        <li class="border-b py-2">Product 5 - $59.99</li>
        <li class="border-b py-2">Product 6 - $69.99</li>
        <li class="border-b py-2">Product 7 - $79.99</li>
        <li class="border-b py-2">Product 8 - $89.99</li>
        <li class="border-b py-2">Product 9 - $99.99</li>
        <li class="border-b py-2">Product 10 - $109.99</li>
    </ul>
</div>
@endsection
