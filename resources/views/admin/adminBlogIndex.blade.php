@extends('layout.adminMain')

@section('adminContent')

    <body>
        <h1>Blogs</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Last updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog['title'] }}</td>
                        <td class="ps-8">{{ Str::limit($blog['content'], 30, '......') }}</td>
                        <td class="ps-8">{{ date('d-F-Y', strtotime($blog['updated_at'])) }}</td>
                        <td class="ps-8">
                            <div class="flex ">
                                <a href="{{ route('blogs.adminEdit', $blog['id']) }}">
                                    <button class="text-teal-600">Edit</button>
                                </a>

                                <form action="{{ route('blogs.adminDestroy', $blog['id']) }}" method="post" id="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button class="ms-2 text-red-600" id="deleteButton" data-modal-target="default-modal"
                                        data-modal-toggle="default-modal">Delete</button>


                                </form>


                        </td>
                    </tr>
                @endforeach





            </tbody>

        </table>

    </body>
@endsection
