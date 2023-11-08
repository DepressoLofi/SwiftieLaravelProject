@extends('layout.adminMain')

@section('adminContent')
    <a href="{{ route('blogs.adminIndex') }}">back</a> <br>

    <img src="{{ asset($blog['image_path']) }}" alt="" class="w-96">



    <form action="{{ route('blogs.adminUpdate', $blog['id']) }}" method="post">
        @csrf

        <label for="">Title</label> <br>
        <input type="text" name="title" value="{{ $blog['title'] }}"> <br>
        <label for="">The Content</label>
        <textarea name="content" cols="30" rows="10">{{ $blog['content'] }}</textarea> <br>
        <input type="submit" value="Update!">
    </form>
@endsection
