@extends('layouts.app')

@section('title', 'scholarship form - admin')

@section('contents')
<h1>add scholarship</h1>
<div class="space-y-12 ml-10">
    <div class="border-b border-gray-900/10 pb-12">
        <form action="{{ route('scholarships.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="border-b border-gray-900/10 pb-12">
                <p class="text-base/7 font-semibold text-gray-900">Scholarship Information</p>
                <p class="mt-1 text-sm/6 text-gray-600">Fill out the details to add a new scholarship.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- Title -->
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="4"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Requirements -->
                    <div class="sm:col-span-2">
                        <label for="requirement" class="block text-sm/6 font-medium text-gray-900">Requirement</label>
                        <div class="mt-2">
                            <input type="text" name="requirement" id="requirement" value="{{ old('requirement') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            @error('requirement')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Deadline -->
                    <div class="sm:col-span-2">
                        <label for="deadline" class="block text-sm/6 font-medium text-gray-900">Deadline</label>
                        <div class="mt-2">
                            <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            @error('deadline')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Upload Additional Documents -->
                    {{-- <div class="sm:col-span-2">
                        <label class="block text-sm mb-3 font-medium text-gray-900" for="documents">Upload Additional Documents</label>
                        <input type="file" name="documents[]" multiple
                            class="block w-full text-sm text-gray-900 border border-gray-800 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                            id="documents">
                        @error('documents')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div> --}}

                <!-- Submit Button -->
                <button type="submit"
                    class="text-white bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add Scholarship
                </button>
            </div>
        </form>
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

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

@endsection
