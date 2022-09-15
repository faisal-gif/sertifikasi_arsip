<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Website Arsip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('template/sidebar.css')}}">

</head>

<body>

    <div class="sidebar">
        <h4>Menu</h4>
        <a class="{{ request()->segment(1) == 'arsip' ? 'active' : '' }}" href="{{route('arsip.index')}}">Arsip</a>
        <a class="{{ request()->segment(1) == 'about' ? 'active' : '' }}" href="{{route('about')}}">About</a>

    </div>

    <div class="content">
        @yield('isi')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>