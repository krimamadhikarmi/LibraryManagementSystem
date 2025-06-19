<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @vite('resources/css/app.css')
    <title>Admin Home Page</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <x-adminHeader />

    <livewire:book-stats />
    <livewire:book-display />

</body>

</html>
