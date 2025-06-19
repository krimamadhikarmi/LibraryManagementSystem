<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Library App</title>

</head>

<body class="antialiased bg-gray-100">

    <x-userHeader />
    {{-- @include('home.category') --}}
    @include('home.book')

</body>

</html>
