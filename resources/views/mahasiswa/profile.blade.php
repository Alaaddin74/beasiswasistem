@extends('layouts.app')

@section('title', 'Dashboard - user home')

@section('contents')

<div class="space-y-12 ml-10">
    <div class="border-b border-gray-900/10 pb-12">
        <form action="{{ route('storeProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="border-b border-gray-900/10 pb-12">
                <p class="text-base/7 font-semibold text-gray-900">Profile Information</p>
                <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>
                <input type="text" hidden value="{{$user->id}}" name="userId">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Full name</label>
                    <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ old('name',$user->name) }}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="date" class="block text-sm/6 font-medium text-gray-900">choose your birthday</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker id="birthday" name="birthday" type="text"  value="{{ old('birthday',$user->date_of_birth) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Select date">
                        @error('birthday')
                             <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email',$user->email) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                     @enderror
                </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone number</label>
                    <div class="mt-2">
                    <input id="phone" name="phone" type="text" autocomplete="phone" value="{{ old('phone',$user->phone_number) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                 @enderror
                </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                    <div class="mt-2">
                        <select id="country" name="nationality" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                            <option disabled selected>Select your country</option>
                            <option value="Indonesia" {{ old('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            <option value="Yemen" {{ old('country') == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                            <option value="Other country" {{ old('country') == 'Other country' ? 'selected' : '' }}>Other country</option>
                        </select>
                        @error('nationality')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="gender" class="block text-sm/6 mb-3 font-medium text-gray-900">Gender</label>
                    <div class="flex">
                        <div class="flex items-center me-4">
                            <input id="male" name="gender" type="radio" value="male" {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="male" class="ms-2 text-sm font-medium">Male</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="female" name="gender" type="radio" value="female" {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="female" class="ms-2 text-sm font-medium">Female</label>
                        </div>
                        @error('gender')
                          <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-span-full">
                    <label for="address" class="block text-sm/6 font-medium text-gray-900">Your address</label>
                    <div class="mt-2">
                    <input type="text" name="address" id="address" autocomplete="street-address" value="{{ old('address', $user->address) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
                </div>
                </div>

                {{-- <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                    <div class="mt-2">
                    <input type="text" name="city" id="city" autocomplete="address-level2" value="{{ old('city', $user->city) }}"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    @error('city')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                  @enderror
            </div>
            </div> --}}
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
