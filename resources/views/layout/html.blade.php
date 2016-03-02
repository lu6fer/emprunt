<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.navbar')

    <div class="container">
        @yield('content')
    </div>

    {{ csrf_field() }}
    @include('includes.js')
</body>
</html>