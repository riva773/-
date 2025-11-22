<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')
    <script src="https://kit.fontawesome.com/d6ea59cc6f.js" crossorigin="anonymous"></script>

</head>

<body>
    @include('layouts.header')
    @yield('content')
</body>

</html>