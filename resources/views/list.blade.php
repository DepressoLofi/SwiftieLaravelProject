<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>THis is List page</h1>
    @foreach ($swifties as $swiftie)
    <h5>{{ $swiftie->name }}</h5>
    <h5>{{ $swiftie->album_name }}</h5>

    @endforeach

</body>

</html>
