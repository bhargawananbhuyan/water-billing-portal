<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (Session::has('success'))
        <div x-data="{ open: true }" x-init="$nextTick(() => {
            setTimeout(() => {
                open = false
            }, 2000)
        })"
            class="fixed top-2.5 left-0 w-full grid place-items-center px-2.5">
            <p x-show="open" class="bg-green-500 text-sm px-2.5 py-2 rounded text-white">{{ Session::get('success') }}
            </p>
        </div>
    @endif

    <div class="min-h-screen flex flex-col">
        @include('inc.header')
        <main class="flex-grow container py-8">
            @yield('main')
        </main>
        @include('inc.footer')
    </div>
</body>

</html>
