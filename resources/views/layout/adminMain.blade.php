<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swiftie Web</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ URL('images/taylor.png') }}">

</head>

<body class="bg-zinc-200">

    @yield('adminContent')
</body>

</html>
