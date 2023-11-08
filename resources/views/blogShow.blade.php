@extends('layout.main')

@Section('content')
    @php
        $previousUrl = url()->previous();
        $currentUrl = url()->current();
    @endphp

    <div class="flex justify-center mt-10">
        <div class="container bg-stone-200 bg-opacity-75 w-3/5 px-6 mb-20">
            <a href="{{ $previousUrl === $currentUrl ? route('blogs.index') : $previousUrl }}">
                <div class="flex text-xl font-semibold pt-6 text-violet-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <p class="ms-1">Back</p>
                </div>
            </a>

            <hr class="h-px mt-4 mb-8 bg-amber-500 border-0 dark:bg-gray-700">
            <img src="{{ $blog['image_path'] }}" class="w-full">



            <hr class="h-px mt-4 mb-8 bg-amber-500 border-0 dark:bg-gray-700">
            <h1 class="text-6xl font-semibold mb-10">{{ $blog['title'] }}</h1>
            <p class="font-normal">{!! nl2br(e($blog['content'])) !!}</p>

            <hr class="h-px mt-10 mb-8 bg-amber-500 border-0 dark:bg-gray-700">
            <p class="mb-6 font-normal text-violet-800 text-end ">
                {{ date('F j, Y', strtotime($blog['updated_at'])) }}
            </p>
        </div>

    </div>
@endsection
