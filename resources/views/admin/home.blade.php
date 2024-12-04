
@extends('layouts.app')

@section('title', 'Dashboard - User Home')

@section('contents')
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
<h1>home admin</h1>
<form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
    @csrf
    <button class="btn btn-danger" type="submit">Logout</button>
</form>
@endsection
