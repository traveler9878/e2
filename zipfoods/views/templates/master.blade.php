<!doctype html>
<html lang='en'>

<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='/css/zipfoods.css' rel='stylesheet'>

    @yield('head')

</head>

<body>

    <header>
        <h1><img id='logo' src='/images/zipfoods-logo.png' alt='Harvard Extension School Logo'></h1>

    </header>

    <main>
        @yield('content')
    </main>

    @yield('body')

</body>

</html>