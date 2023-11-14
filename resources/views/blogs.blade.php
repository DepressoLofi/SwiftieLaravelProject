@extends('layout.main')


@section('content')
    <div>
        <div class="text-center mt-14">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Latest Blogs
                </span></h1>
        </div>


        <div class="grid grid-cols-4 gap-10 mt-16 justify-content-center mx-24">
            @foreach ($blogs as $blog)
                <div
                    class="max-w-sm bg-white border outline shadow-lg outline-1 outline-black-500 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                    <img class="rounded-t-lg w-full" src="{{ $blog['image_path'] }}"
                        style="min-height: 200px; max-height: 200px; " />

                    <div class="p-5">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                            style="min-height:55px; max-height:55px">
                            {{ Str::limit($blog['title'], 20) }}
                        </h5>

                        <p class="mb-1 font-normal text-blue-800 dark:text-gray-400">
                            {{ date('F j, Y', strtotime($blog['updated_at'])) }}
                        </p>

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                            style="min-height:90px; max-height:90px">
                            {{ Str::limit($blog['content'], 100) }}
                        </p>
                        <a href="{{ route('blogs.Show', $blog['id']) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-800 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center my-16">
            <div>{{ $blogs->links('layout.customPagination') }}</div>
        </div>


    </div>


    <script>
        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection

{{-- <img src="{{ $blog['image_path'] }}" class="w-96">
            <p>{{ $blog['title'] }}</p>
            <p>{!! nl2br(e($blog['content'])) !!}</p> --}}
