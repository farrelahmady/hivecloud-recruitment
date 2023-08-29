<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>HiveCloud | {{ $title }}</title>
</head>

<body>
    @include('layouts.partials.sidebar')

    <main class="p-4 sm:ml-64">
        <div class="mb-4">
            <h1 class="text-4xl font-bold mb-4">{{ $title }}</h1>
            <hr>
        </div>
        <div class="grid lg:grid-cols-3">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>

</html>
