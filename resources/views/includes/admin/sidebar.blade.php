<div class="sidebar-sm" id="sidenav">
    <ul class="nav navbar-nav sidenav sidenav-inverse">
        <li>
            <!-- Tanks -->
            <a href="javascript:;" data-toggle="collapse" data-parent="#sidenav" data-target="#tank" role="button">
                <i class="fa fa-fw ef-tank"></i>&nbsp;
            <span class="sidenav-link">
                Blocs <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="tank" class="collapse {{ Request::segment(2) === 'tank' ? 'in' : null }}">
                <!-- list -->
                <li class="{{ (Request::segment(2) === 'tank' && Request::segment(3) === null) ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Lister les blocs">
                    <a href="{!! url('admin/tank') !!}">
                        <i class="fa fa-fw fa-list"></i>&nbsp;
                    <span class="sidenav-link">
                        Liste
                    </span>
                    </a>
                </li>
                <!-- TIV -->
                <li class="{{ (Request::segment(2) === 'tank' && Request::segment(3) === 'tiv') ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="T.I.V.">
                    <a href="{!! url('admin/tank/tiv') !!}">
                        <i class="fa fa-fw fa-wrench"></i>&nbsp;
                    <span class="sidenav-link">
                        T.I.V.
                    </span>
                    </a>
                </li>
                <!-- Borrow history -->
                <li class="{{ (Request::segment(2) === 'tank' && Request::segment(3) === 'history') ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Historique des emprunts">
                    <a href="{!! url('admin/tank/history') !!}">
                        <i class="fa fa-fw fa-history"></i>&nbsp;
                    <span class="sidenav-link">
                        Historique des emprunts
                    </span>
                    </a>
                </li>
                <!-- Buy history -->
                <li class="{{ (Request::segment(2) === 'tank' && Request::segment(3) === 'buy') ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Historique des achats">
                    <a href="{!! url('admin/tank/buy') !!}">
                        <i class="fa fa-fw fa-money"></i>&nbsp;
                    <span class="sidenav-link">
                        Historique des achats
                    </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <!-- Regulator -->
            <a href="javascript:;" data-toggle="collapse" data-target="#regulator">
                <i class="fa fa-fw ef-regulator"></i>&nbsp;
            <span class="sidenav-link">
                Détendeurs <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="regulator" class="collapse {{ Request::segment(2) === 'regulator' ? 'in' : null }}">
                <!-- list -->
                <li class="{{ (Request::segment(2) === 'regulator' && Request::segment(3) === null) ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Lister les détendeurs">
                    <a href="{!! url('admin/regulator') !!}">
                        <i class="fa fa-fw fa-list"></i>&nbsp;
                    <span class="sidenav-link">
                        Liste
                    </span>
                    </a>
                </li>
                <!-- Borrow history -->
                <li class="{{ (Request::segment(2) === 'regulator' && Request::segment(3) === 'history') ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Historique des emprunts">
                    <a href="{!! url('admin/regulator/history') !!}">
                        <i class="fa fa-fw fa-history"></i>&nbsp;
                    <span class="sidenav-link">
                        Historique des emprunts
                    </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <!-- Stab -->
            <a href="javascript:;" data-toggle="collapse" data-target="#stab">
                <i class="fa fa-fw ef-jacket"></i>&nbsp;
            <span class="sidenav-link">
                Stab <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="stab" class="collapse {{ Request::segment(2) === 'stab' ? 'in' : null }}">
                <!-- list -->
                <li class="{{ (Request::segment(2) === 'stab' && Request::segment(3) === null) ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Lister les stabs">
                    <a href="{!! url('admin/stab') !!}">
                        <i class="fa fa-fw fa-list"></i>&nbsp;
                    <span class="sidenav-link">
                        Liste
                    </span>
                    </a>
                </li>
                <!-- Borrow history -->
                <li class="{{ (Request::segment(2) === 'stab' && Request::segment(3) === 'history') ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Historique des emprunts">
                    <a href="{!! url('admin/stab/history') !!}">
                        <i class="fa fa-fw fa-history"></i>&nbsp;
                    <span class="sidenav-link">
                        Historique des emprunts
                    </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#user">
                <i class="fa fa-fw fa-users"></i>&nbsp;
            <span class="sidenav-link">
                Utilisateurs <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="user" class="collapse {{ Request::segment(2) === 'user' ? 'in' : null }}">
                <!-- list -->
                <li class="{{ (Request::segment(2) === 'user' && Request::segment(3) === null) ? 'active' : null }}"
                    data-toggle="tooltip"
                    data-placement="right"
                    data-original-title="Lister les utilisateurs">
                    <a href="{!! url('admin/user') !!}">
                        <i class="fa fa-fw fa-list"></i>&nbsp;
                    <span class="sidenav-link">
                        Liste
                    </span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav sidenav sidenav-inverse sidenav-shrink">
        <li>
            <a id="sidebar_shrink"
               data-target="#sidebar"
               data-toggle="tooltip"
               data-placement="right"
               data-original-title="Réduire">
                <i class="fa fa-arrow-right"></i>
                {{--<span class="sidenav-link"> Réduire</span>--}}
            </a>
        </li>
    </ul>
</div>