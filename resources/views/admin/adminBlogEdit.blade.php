@extends('layout.adminMain')

@section('adminContent')
    <div class="flex justify-center ms-4">
        <form action="{{ route('blogs.adminUpdate', $blog['id']) }}" method="post"
            class=" w-3/5 border border-gray-200 rounded-lg border border-black shadow px-2 bg-neutral-100 bg-yellow-100"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <a href="{{ route('blogs.adminIndex') }}">
                    <div class="flex text-xl font-semibold pt-4 text-violet-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        <p class="ms-1">Back</p>

                    </div>
                </a>
                <h1 class="mb-4 text-3xl text-center font-extrabold leading-none tracking-tight text-purple-900 mb-10">
                    Edit</h1>
            </div>
            <hr class="h-0.5 mb-2 bg-amber-500 border-0 dark:bg-gray-700">


            <div class="items-center">
                <div class="relative w-full h-96 px-26 z-10">
                    <img id='preview_img' class="w-full h-full " src="{{ asset($blog['image_path']) }}"
                        alt="Current profile photo" />
                    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full cursor-cell overflow-hidden bg-indigo-500 bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-50"
                        id='click_img'>
                    </div>

                </div>
                <input type="file" name="img" class="" id="customFile1" onchange="loadFile(event)" hidden>


            </div>
            <div class="block min-h-[24px]">
                @error('img')
                    <span class="text-xs text-red-600 ms-2 font-bold">{{ $message }}</span>
                @enderror
            </div>


            <div class="mt-2">
                <div class="block mb-2">
                    <label for="title" class="text-xl">Title</label>
                    @error('title')
                        <span class="text-xs text-red-600 ms-2 font-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="text" name="title"
                    class="block w-full p-2 text-3xl font-semibold text-center focus:outline-none"
                    value="{{ old('title', $blog['title']) }}">
            </div>


            <hr class="w-full h-1 bg-sky-600 border-0
                    rounded">


            <div class="mt-4 mb-4">
                <div class="block mb-2">
                    <label for="content" class="text-xl">Content</label>
                    @error('content')
                        <span class="text-xs text-red-600 ms-2 font-bold">{{ $message }}</span>
                    @enderror
                </div>
                <textarea name="content" class="p-2 w-full min-h-[500px] overflow-hidden focus:outline-none" id="auto-resize-textarea"
                    rows="auto">{{ old('content', $blog['content']) }}</textarea>
            </div>


            <button type="submit" name="publish" value="publish"
                class="shadow bg-purple-700 hover:bg-purple-950 focus:shadow-outline p-2.5 focus:outline-none text-white font-bold py-2 px-4 rounded ms-2 mb-4">Update!</button>

        </form>
    </div>



    <script src="{{ asset('js/create.js') }}"></script>
@endsection
