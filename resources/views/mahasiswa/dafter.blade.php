@extends('layouts.app')

@section('title', 'Dashboard - User Profile')

@section('contents')
<div class="space-y-12 ml-10">
    <div class="border-b border-gray-900/10 pb-12">
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
        <form action="{{ route('scholarships.dafter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="border-b border-gray-900/10 pb-12">
                <p class="text-base/7 font-semibold text-gray-900">Application Information</p>
                <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>
                <h2 class="mt-1  text-gray-600"><b>Yor are applying for {{$scholarship->title}}</b></h2>
                <input type="text" hidden value="{{$scholarship->id}}" name="scholarshipId">
                <p class="font-bold mt-4">The required docs</p>
                <input type="text" disabled value="{{$scholarship->requirement}}">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="current_institution" class="block text-sm/6 font-medium text-gray-900">Current Institution</label>
                    <div class="mt-2">
                    <input type="text" name="current_institution" id="city" autocomplete="current_institution" value="{{ old('current_institution') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('current_institution')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="program_of_study" class="block text-sm/6 font-medium text-gray-900">program of study</label>
                    <div class="mt-2">
                    <input type="text" name="program_of_study" id="program_of_study" autocomplete="program_of_study" value="{{ old('program_of_study') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('program_of_study')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="current_gpa" class="block text-sm/6 font-medium text-gray-900">current GPA</label>
                    <div class="mt-2">
                    <input type="text" name="current_gpa" id="current_gpa" autocomplete="current_gpa" value="{{ old('current_gpa') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('current_gpa')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="past_education" class="block text-sm/6 font-medium text-gray-900">past education</label>
                    <div class="mt-2">
                    <input type="text" name="past_education" id="past_education" autocomplete="past_education" value="{{ old('current_gpa') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('past_education')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>

                <div class="sm:col-span-2">

                    <label class="block text-sm mb-3 font-medium text-gray-900 " for="multiple_files">Upload multiple files</label>
                    <input name="documents[]" value="{{ old('current_gpa') }}" class="block w-full text-sm text-gray-900 border border-gray-800 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" id="multiple_files" type="file" multiple>
                    @error('documents')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                 @enderror
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
