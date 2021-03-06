<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Emprunt</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="{{ Request::segment(1) === null ? 'active' : null }}">
                    <a href="{{url('/')}}"> Utilisateurs</a>
                </li>
                <li class="{{ Request::segment(1) === 'devices' ? 'active' : null }}">
                    <a href="{{url('devices')}}"> Materiel</a>
                </li>
                <li class="{{ Request::segment(1) === 'admin' ? 'active' : null }}">
                    <a href="{{url('admin')}}"> Administration</a>
                </li>
            </ul>
            @if(Auth::check())
            <ul class="navbar-form navbar-right">
                <li>
                    <a class="btn btn-default"
                       href="{!! url('logout') !!}">Déconnexion</a>
                </li>
            </ul>
            @endif
        </div><!--/.nav-collapse -->
    </div>
</nav>
