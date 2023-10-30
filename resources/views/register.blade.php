@extends('main')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <form action="{{ route('register') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <h1 class="mb-4 text-3xl text-center font-extrabold leading-none tracking-tight text-gray-900 mb-10">
                    Swiftie Form</h1>
                <div class="md:flex md:items-center mb-6 mt-10">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="swiftieName">
                            Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="swiftieName"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text" placeholder="Enter your name" required>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="swiftieFav">
                            Favorite Album
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="relative">
                            <select
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 dark:placeholder-gray-400"
                                name="swiftieFav" required>
                                <option value="" disabled selected>Choose an album</option>
                                <option value="1">Taylor Swift</option>
                                <option value="2">Fearless</option>
                                <option value="3">Speak Now</option>
                                <option value="4">Red</option>
                                <option value="5">1989</option>
                                <option value="6">Reputation</option>
                                <option value="7">Lover</option>
                                <option value="8">Folklore</option>
                                <option value="9">Evermore</option>
                                <option value="10">Midnights</option>

                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="min-height: 50px;">
                    @if (session('success') === true)
                        <p class="text-green-500 text-center">Registration success!</p>
                    @elseif(session('success') === false)
                        <p class="text-red-500 text-center">Registration unsuccessful.</p>
                    @endif
                </div>



                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-1/3">
                        <button
                            class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline w-full p-2.5 focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Done!
                        </button>
                    </div>
                </div>


            </form>


        </div>
        <div>
            <img src="{{ URL('images/giphy.gif') }}" width="400">
        </div>

    </div>
@endsection
