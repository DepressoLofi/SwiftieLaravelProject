@extends('layout.adminMain')

@section('adminContent')

    <body>
        <div class="flex justify-end me-20 mt-6">
            <a href="{{ route('blogs.adminCreate') }}">
                <button
                    class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-4 px-4 border border-amber-700 rounded flex ">
                    Create Blog
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ms-2">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd" />
                    </svg>

                </button>
            </a>


        </div>
        <div class="text-center mt-6">
            <h1 class="mb-4 text-3xl text-emerald-600 font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                Blogs
            </h1>
        </div>
        <div class="mx-20 mb-10">

            <table class="min-w-full text-center text-sm font-light border-collapse border border-slate-400 mt-14">
                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                    <tr>
                        <th scope="col" class=" px-4 py-4">Title</th>
                        <th scope="col" class=" px-8 py-4" style="min-width: 250px; max-width: 250px;">Content</th>
                        <th scope="col" class=" px-6 py-4">Last updated</th>
                        <th scope="col" class=" px-6 py-4" style="min-width: 120px; max-width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr class="border border-neutral-800 text-black font-semibold py-4">
                            <td>{{ $blog['title'] }}</td>
                            <td class="border border-neutral-800 text-black font-semibold py-4"
                                style="min-width: 250px; max-width: 250px;">
                                {{ Str::limit($blog['content'], 100, '......') }}</td>
                            <td class="border border-neutral-800 text-black font-semibold py-4">
                                {{ date('d-F-Y', strtotime($blog['updated_at'])) }}</td>
                            <td style="min-width: 120px; max-width: 120px;">
                                <div class="flex justify-around mx-8 ">
                                    <a href="{{ route('blogs.adminEdit', $blog['id']) }}">
                                        <button
                                            class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 border border-teal-700 rounded">
                                            Edit
                                        </button>
                                    </a>

                                    <form action="{{ route('blogs.adminDestroy', $blog['id']) }}" method="post"
                                        id="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
                                            type="submit">
                                            Delete
                                        </button>
                                    </form>


                            </td>
                        </tr>
                    @endforeach





                </tbody>

            </table>

        </div>

        {{-- <tbody>
                @foreach ($swifties as $swiftie)
                    <tr class="border-b dark:border-neutral-500 bg-white">
                        <td class="border border-neutral-800 text-black font-semibold px-6 py-4">
                            {{ $swiftie->name }}
                        </td>
                        <td class="border border-neutral-800 text-black font-normal px-6 py-4">
                            {{ $swiftie->album_name }}
                        </td>
                    </tr>
                @endforeach

            </tbody> --}}




        {{-- <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Last updated</th>
                    <th>Action</th>
                </tr>
            </thead>


        </table> --}}

    </body>
@endsection
