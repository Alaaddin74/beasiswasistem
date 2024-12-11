
@extends('layouts.app')

@section('title', 'Dashboard - User Home')

@section('contents')
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
<h1>home admin</h1>

<div class=" w-full flex flex-wrap justify-between  p-6 bg-white   border  rounded-lg shadow  ">
    <a href="#" class=" h-40 w-1/3 flex flex-col justify-between items-center  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Available Applications</h5>
        <h3 class="font-normal text-2xl  text-gray-700 dark:text-gray-400">{{$applications}}</h3>
    </a>
    <a href="#" class="h-40 w-1/3  flex flex-col justify-between items-center  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Available Scholarships</h5>
        <p class="font-normal text-2xl  text-gray-700 dark:text-gray-400">{{$scholarships}}</p>
    </a>
    <a href="#" class="h-40 w-1/3  flex flex-col justify-between items-center  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Available Users</h5>
        <p class="font-normal text-2xl  text-gray-700 dark:text-gray-400">{{$users}}</p>
    </a>

    <a href="#" class=" h-40 w-1/3 flex flex-col justify-between items-center  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class="text-2xl font-bold tracking-tight text-green-900 dark:text-green-300">Applications Accepted </h5>
        <h3 class="font-normal text-2xl  text-gray-700 dark:text-gray-400">{{$accepted}}</h3>
    </a>
    <a href="#" class="h-40 w-1/3  flex flex-col justify-between items-center  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-red-400">Applications Rejected </h5>
        <p class="font-normal text-2xl  text-gray-700 dark:text-gray-400">{{$rejected}}</p>
    </a>
    <a href="#" class="h-40 w-1/3  flex flex-col justify-between items-center  max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-yellow-200">Applications Pending</h5>
        <p class="font-normal text-2xl  text-gray-700 dark:text-gray-400">{{$pending}}</p>
    </a>
</div>



@endsection
