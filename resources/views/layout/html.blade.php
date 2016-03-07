<!DOCTYPE html>
<html lang="fr">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.navbar')

    <!-- Display messages -->
    <div class="container-fluid">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
    </div>

    <div id="wrapper">
        <div id="sidebar">
            @yield('sidebar')
        </div>
        <div id="content">
            @yield('content')
        </div>
    </div>

    @include('includes.js')
</body>
</html>