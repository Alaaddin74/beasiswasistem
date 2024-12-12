@extends('layouts.app')

@section('title', 'Dashboard - User Home')

@section('contents')

    <div class="p-6 max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Notifications</h1>

        <div class="space-y-4">
            @forelse ($notifications as $item)
                <div class="bg-white border border-gray-200 shadow-sm rounded-lg p-4 flex justify-between items-center">
                    <div class="flex items-start">
                        <div class="mr-6 relative">
                            @if (!$item->seen)
                                <span class="absolute top-2 left-0 block w-3 h-3 bg-red-500 rounded-full"></span>
                            @endif
                        </div>
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ $item->getScholarshipName() }}
                            </h2>
                            <p class="text-sm text-gray-600">{{ $item->message }}</p>
                        </div>
                    </div>
                    @if (!$item->seen)
                        <form action="{{ route('changeSeenStates', [$item->id]) }}" method="POST" class="ml-4">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                                Mark as read
                            </button>
                        </form>
                    @endif
                </div>
            @empty
                <div class="text-center text-gray-500">No notifications available.</div>
            @endforelse
        </div>
    </div>
@endsection
