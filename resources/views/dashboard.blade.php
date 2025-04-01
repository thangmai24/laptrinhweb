<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</head>
<body>
<div class="header">
        <h4><a href="{ route('signout') }">Home |</a></h4>
        <h4><a href="{{ route('login') }}">Dang nhap |</a></h4>
        <h4><a href="{{ route('user.createUser') }}">Dang ky</a></h4>
    </div>
@yield('content')

@include('foodter')
</body>
</html>
