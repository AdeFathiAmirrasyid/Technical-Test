<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Test Web Programmer</title>
    @include('home.partials.link')
</head>

<body>
    @include('home.partials.sidebar')
    @yield('container')
    @include('home.partials.script')
</body>

</html>
