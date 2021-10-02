<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ areActiveRoutes(['admin.home']) }}"><a href="{{ route('admin.home') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>

            @if(checkPermissions(['list users', 'edit users', 'show users', 'delete users']))
                <li class="{{ areActiveRoutes(['admin.users.index', 'admin.users.edit', 'admin.users.update']) }}"><a href="{{ route('admin.users.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Users">Users</span></a>
                </li>
            @endif

            @if(checkPermissions(['list roles', 'create roles', 'edit roles', 'show roles', 'delete roles']))
                <li class="{{ areActiveRoutes(['admin.roles.index', 'admin.roles.edit', 'admin.roles.update']) }}"><a href="{{ route('admin.roles.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Users">Roles</span></a>
                </li>
            @endif

            @if(checkPermissions(['list employees', 'create employees', 'edit employees', 'show employees', 'delete employees']))
                <li class="{{ areActiveRoutes(['admin.employees.index', 'admin.employees.edit', 'admin.employees.update']) }}"><a href="{{ route('admin.employees.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Users">Employees</span></a>
                </li>
            @endif

            
        </ul>
    </div>
</div>
<!-- END: Main Menu-->