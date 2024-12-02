@extends('layouts.app')

@section('title', 'Dashboard - User Home')

@section('contents')
<h1>home admin</h1>
<form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
    @csrf
    <button class="btn btn-danger" type="submit">Logout</button>
</form>
@endsection
