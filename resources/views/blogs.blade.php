<div>
    @foreach ($blogs as $blog)
        <img src="{{ $blog['image_path'] }}" alt="">
        <p>{{ $blog['title'] }}</p>
        <p>{{ $blog['content'] }}</p>
    @endforeach


</div>
