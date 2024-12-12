
@extends('layouts.app')

@section('title', 'Admin - Review Application')

@section('contents')
<div class="space-y-12 ml-10">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
    <div class="border-b border-gray-900/10 pb-12">
        <p class="text-base font-semibold text-gray-900">Application Details</p>
        <p class="mt-1 text-sm text-gray-600">Review the details of the application and update its status if necessary.</p>
        <h2 class="mt-1 text-gray-600"><b>Scholarship: {{$application->scholarship->title}}</b></h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Full Name</label>
                <p class="mt-2 text-gray-700">{{ $application->user->name }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Date of Birth</label>
                <p class="mt-2 text-gray-700">{{ $application->user->date_of_birth }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Gender</label>
                <p class="mt-2 text-gray-700">{{ ucfirst($application->user->gender) }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Nationality</label>
                <p class="mt-2 text-gray-700">{{ $application->user->nationality }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Email</label>
                <p class="mt-2 text-gray-700">{{ $application->user->email }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Phone Number</label>
                <p class="mt-2 text-gray-700">{{ $application->user->phone_number }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Address</label>
                <p class="mt-2 text-gray-700">{{ $application->user->address }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Current Institution</label>
                <p class="mt-2 text-gray-700">{{ $application->current_institution }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Program of Study</label>
                <p class="mt-2 text-gray-700">{{ $application->program_of_study }}</p>
            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium text-gray-900">Current GPA</label>
                <p class="mt-2 text-gray-700">{{ $application->current_gpa }}</p>
            </div>

            <div class="sm:col-span-6">
                <label class="block text-sm font-medium text-gray-900">Past Education</label>
                <p class="mt-2 text-gray-700">{{ $application->past_education }}</p>
            </div>

            <div class="sm:col-span-6">
                <form action="{{ route('manageApplications.update', $application->id) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="flex justify-between">
                        <div class="w-full">

                        <label class="block text-sm font-medium text-gray-900">Status</label>
                        <select name="status" id="status" class="mt-2 block w-28 rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full flex flex-col">
                        <label for="message">Notification</label>
                        <textarea name="message" id="message" class=" border-2 p-2" cols="30" rows="5">{{$messagesText}}</textarea>

                    </div>
                </div>

                    <button type="submit" class="mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Update Status</button>
                </form>
            </div>

            <div class="sm:col-span-6">
                <label class="block text-sm font-medium text-gray-900">Uploaded Documents</label>
                <ul class="mt-2">
                    @foreach(json_decode($application->documents, true) as $document)
                        <li>
                            <a href="{{ asset('storage/' . $document) }}" target="_blank" class="text-blue-500 hover:underline">{{ basename($document) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
