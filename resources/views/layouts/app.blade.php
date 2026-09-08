<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Character Archive' )</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-4 mb-4">
        <div class="container">
            <h1 class="h2 mb-3">Genshin Impact Character Archive</h1>

            @include('partials._nav' )

            <p class="mb-0 mt-3 text-white-50">
                John Cedric P. Taopo
            </p>
        </div>
    </header>

    <main class="container pb-5">
        @yield('content')
    </main>

</body>
</html>
