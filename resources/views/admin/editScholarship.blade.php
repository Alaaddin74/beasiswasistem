@extends('layouts.app')

@section('title', 'Dashboard - admin Home')

@section('contents')
<h1>edit scholarships</h1>
<div class="space-y-12 ml-10">
    <div class="border-b border-gray-900/10 pb-12">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        {{-- {{ route('scholarships.dafter.store') }} --}}
        <form action="{{ route('scholarships.update', $scholarship->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="border-b border-gray-900/10 pb-12">
                <p class="text-base/7 font-semibold text-gray-900">scholarship Information</p>
                <h2 class="mt-1  text-gray-600"><b>You are editing  {{$scholarship->title}}</b></h2>
                <input type="text" hidden value="{{$scholarship->id}}" name="scholarshipId">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="Title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                    <input type="text" name="title" id="city" autocomplete="title" value="{{ old('title',$scholarship->title) }}" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">description</label>
                    <div class="mt-2">
                    <textarea type="text" name="description" id="description" autocomplete="description"
                    value="{{ old('description', $scholarship->description) }}"
                    class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                    >{{$scholarship->description}}</textarea>
                    @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="requirement" class="block text-sm/6 font-medium text-gray-900">requirement</label>
                    <div class="mt-2">
                    <input type="text" name="requirement" id="requirement" autocomplete="requirement" value="{{ old('requirement',$scholarship->requirement) }}" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('requirement')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="deadline" class="block text-sm/6 font-medium text-gray-900">past education</label>
                    <div class="mt-2">
                    <input type="date" name="deadline" id="deadline" autocomplete="deadline" value="{{ old('deadline',$scholarship->deadline )}}" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('deadline')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

@endsection
