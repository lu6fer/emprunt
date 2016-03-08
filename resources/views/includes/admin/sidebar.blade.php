<div class="sidebar-md" id="sidenav">
    <ul class="nav navbar-nav sidenav sidenav-inverse">
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#bloc" role="button">
                <i class="fa fa-fw ef-tank"></i>&nbsp;
            <span class="sidenav-link">
                Blocs <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="bloc" class="collapse {{ Request::segment(2) === 'blocks' ? 'in' : null }}">
                <li class="{{ Request::segment(2) === 'blocks' ? 'active' : null }}">
                    <a href="{!! url('admin/blocks') !!}"
                       data-toggle="tooltip"
                       data-placement="right"
                       title="Lister les blocs">
                        <i class="fa fa-fw fa-list"></i>&nbsp;
                    <span class="sidenav-link">
                        Liste
                    </span>
                    </a>
                </li>
                <li class="{{ Request::segment(3) === 'tiv' ? 'active' : null }}">
                    <a href="{!! url('admin/blocks/tiv') !!}"
                       data-toggle="tooltip"
                       data-placement="right"
                       title="T.I.V.">
                        <i class="fa fa-fw fa-wrench"></i>&nbsp;
                    <span class="sidenav-link">
                        T.I.V.
                    </span>
                    </a>
                </li>
                <li class="{{ Request::segment(3) === 'history' ? 'active' : null }}">
                    <a href="{!! url('admin/blocks/history') !!}"
                       data-toggle="tooltip"
                       data-placement="right"
                       title="Historique des emprunts">
                        <i class="fa fa-fw fa-history"></i>&nbsp;
                    <span class="sidenav-link">
                        Historique des emprunts
                    </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#regulator">
                <i class="fa fa-fw ef-regulator"></i>&nbsp;
            <span class="sidenav-link">
                Détendeurs <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="regulator" class="collapse">
                <li>
                    <a href="#">
                        <span class="sidenav-link">Dropdown Item</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidenav-link">Dropdown Item</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#stab">
                <i class="fa fa-fw ef-jacket"></i>&nbsp;
            <span class="sidenav-link">
                Stab <i class="fa fa-fw fa-caret-down"></i>
            </span>
            </a>
            <ul id="stab" class="collapse">
                <li>
                    <a href="#"><span class="sidenav-link">Dropdown Item</span></a>
                </li>
                <li>
                    <a href="#"><span class="sidenav-link">Dropdown Item</span></a>
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
            <ul id="user" class="collapse">
                <li>
                    <a href="#"><span class="sidenav-link">Dropdown Item</span></a>
                </li>
                <li>
                    <a href="#"><span class="sidenav-link">Dropdown Item</span></a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav sidenav sidenav-inverse sidenav-shrink">
        <li>
            <a href="javascript:;" id="sidebar_shrink" data-target="#sidebar">
                <i class="fa fa-arrow-left"></i>
                <span class="sidenav-link"> Réduire</span>
            </a>
        </li>
    </ul>
</div>