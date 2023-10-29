@extends('main')

@section('content')
    <div class="flex flex-col w-80">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light border-collapse border border-slate-400">
                        <thead
                            class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                            <tr>
                                <th scope="col" class=" px-6 py-4">Name</th>
                                <th scope="col" class=" px-6 py-4">Album</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($swifties as $swiftie)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="border border-neutral-800 text-purple-900 font-normal px-6 py-4">
                                        {{ $swiftie->name }}
                                    </td>
                                    <td class="border border-neutral-800 text-purple-900 font-normal px-6 py-4">
                                        {{ $swiftie->album_name }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
