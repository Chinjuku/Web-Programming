<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css')  --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title> @yield('title') | Chinjuku </title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="/form">add-title</a>
            </li>
            <li>
                {{-- <a href=" {{ route('login') }} ">login</a> --}}
            </li>
        </ul>
    </nav>
    <h1 class="text-3xl font-bold">Welcome to my home page</h1>
    <div class="bg-slate-500">
        @yield('content1')
    </div>
    <div class="bg-green-300">
        @yield('content2')
    </div>
    <div>
        @yield('content3')
    </div>
</body>
</html>