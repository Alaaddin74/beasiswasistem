@extends('layouts.app')

@section('title', 'Dashboard - user home')

@section('contents')

<h1>applications list</h1>
<div class="relative overflow-x-auto ml-20 mr-20 mt-48">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Scholarship
                </th>
                <th scope="col" class="px-6 py-3">
                    Study Progam
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($scholarshipApplications->isEmpty())
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">No users found.</td>
                </tr>
            @else
                @foreach ($scholarshipApplications  as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->scholarship->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->program_of_study }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('applications.edit', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('applications.destroy', $user->id) }}" method="POST" class="inline-block ms-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Are you sure you want to remove this application?')">Remove</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
