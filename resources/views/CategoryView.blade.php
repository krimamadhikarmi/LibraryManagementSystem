<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    {{ dd($category) }}
    <table class="border border-black w-full mt-8">
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Edit</th>
            <th class="border px-4 py-2">Delete</th>
        </tr>
        @foreach ($category as $categories)
            <tr>
                <td class="border px-4 py-2">{{ $categories->id }}</td>
                <td class="border px-4 py-2">{{ $categories->category_name }}</td>
                <td class="border px-4 py-2">Edit</td>
                <td class="border px-4 py-2">Delete</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
