@extends('layouts.app')

@section('manageApplications', 'applications - admin')

@section('contents')
<h1>Manage applications</h1>
<h1 class="text-xl font-semibold mb-4">Applications</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Applicant</th>
                <th scope="col" class="px-6 py-3">Scholarship</th>
                <th scope="col" class="px-6 py-3">GPA</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($applications as $application)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $application->id }}</td>
                    <td class="px-6 py-4">{{ $application->user->name }}</td>
                    <td class="px-6 py-4">{{ $application->scholarship->title }}</td>
                    <td class="px-6 py-4">{{ $application->current_gpa }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-white {{ $application->status == 'approved' ? 'bg-green-500' : ($application->status == 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex gap-3">
                        <a href="{{route('manageApplications.edit', $application->id)}}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">No applications found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
