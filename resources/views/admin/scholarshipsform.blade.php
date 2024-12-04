@extends('layouts.app')

@section('title', 'scholarship form - admin')

@section('contents')
<h1>form scholarship</h1>
<div class="relative overflow-x-auto ml-20 mr-20 mt-18">
    <div class="mb-4 flex justify-end">
        <a href="{{ route('admin.addScholarship') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add New Scholarship
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    description
                </th>
                <th scope="col" class="px-6 py-3">
                    requirments
                </th>
                <th scope="col" class="px-6 py-3">
                    deadline......
                </th>
                <th scope="col" class="px-6 py-3">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($scholarships->isEmpty())
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">No users found.</td>
                </tr>
            @else
                @foreach ($scholarships  as $scholarship)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $scholarship->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $scholarship->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $scholarship->requirement }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $scholarship->deadline }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{route('admin.editScholarship', $scholarship->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('scholarship.admin.destroy', $scholarship->id) }}" method="POST" class="inline-block ms-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Are you sure you want to remove this application?')">Remove</button>
                            </form>
                        </td>
                        {{-- {{ route('admin.editScholarship', $user->id) }}
                        {{ route('applications.destroy', $user->id) }} --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
