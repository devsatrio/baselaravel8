<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @if (auth()->user()->can('view-users') ||
            auth()->user()->can('create-users') ||
            auth()->user()->can('edit-users') ||
            auth()->user()->can('delete-users') ||
            auth()->user()->can('view-roles') ||
            auth()->user()->can('create-roles') ||
            auth()->user()->can('edit-roles') ||
            auth()->user()->can('delete-roles') ||
            auth()->user()->can('view-permission') ||
            auth()->user()->can('create-permission') ||
            auth()->user()->can('edit-permission') ||
            auth()->user()->can('delete-permission'))
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if (auth()->user()->can('view-permission') ||
                        auth()->user()->can('create-permission') ||
                        auth()->user()->can('edit-permission') ||
                        auth()->user()->can('delete-permission'))
                        <li class="nav-item">
                            <a href="{{ url('permission') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->can('view-roles') ||
                        auth()->user()->can('create-roles') ||
                        auth()->user()->can('edit-roles') ||
                        auth()->user()->can('delete-roles'))
                        <li class="nav-item">
                            <a href="{{ url('roles') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->can('view-users') ||
                        auth()->user()->can('create-users') ||
                        auth()->user()->can('edit-users') ||
                        auth()->user()->can('delete-users'))
                        <li class="nav-item">
                            <a href="{{ url('users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        <li class="nav-item">
            <a href="{{ url('/setting-web') }}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Setting Web
                </p>
            </a>
        </li>
        {{-- Example Drop Down Menu <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Charts
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../charts/chartjs.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>ChartJS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../charts/flot.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Flot</p>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- EXAMPLE Single Menu <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li> --}}
    </ul>
</nav>
