@extends('dashboard.layouts.main')
{{-- untuk isi main --}}
@section('container')
<h2>Selamat Datang {{ auth()->user()->name }}</h2>

@endsection
