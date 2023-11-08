@extends('layout.adminMain')

@section('adminContent')
    <div class="ms-48">
        <form action="{{ route('blogs.adminStore') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="img" class="block">Blog picture</label>
            <input type="file" name="img" class="form-control" required> <br>

            <label for="title" class="block">Title</label>
            <input type="text" name="title" class="form-control" required> <br>

            <label for="content" class="block">Content</label>
            <textarea name="content" id="" cols="30" rows="10" required></textarea> <br>

            <button type="submit" name="publish" value="publish"
                class="shadow bg-purple-700 hover:bg-purple-950 focus:shadow-outline p-2.5 focus:outline-none text-white font-bold py-2 px-4 rounded">Upload
                Post</button>
            {{-- <button type="submit" name="publish" value="draft"
                class="shadow bg-amber-500 hover:bg-amber-700 focus:shadow-outline p-2.5 focus:outline-none text-white font-bold py-2 px-4 rounded">Save
                Draft</button> --}}
        </form>
    </div>
@endsection
