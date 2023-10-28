<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiftie Web</title>
</head>

<body>
    <h1>This is a register page</h1>

    <form action="{{route('register')}}" method="post">
        @csrf
        <label for="swiftieName">Name: </label>
        <input type="text" name="swiftieName" id="" required><br>
        <label for="swiftieFav">Favorite Album: </label>
        <select name="swiftieFav" id="" required>
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
            <input type="submit" value="Done!">
        </select>
    </form>

    @if(session('success') === true)
    <div style="color: green;">Registration success!</div>
    @elseif(session('success') === false)
    <div style="color: red;">Registration unsuccessful.</div>
    @endif
</body>

</html>
