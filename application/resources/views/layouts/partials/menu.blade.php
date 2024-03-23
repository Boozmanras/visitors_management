 <!-- Menu -->
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- SVG content -->
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Yala</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <!-- Visitor Log -->
        <li class="menu-item {{ Request::segment(1) === 'visitor-log' ? 'active' : '' }}">
            <a href="{{ url('visitor-log') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-analytics"></i>
                <div data-i18n="Visitor Log">Visitor Log</div>
            </a>
        </li>
        <!-- Visitor Timeline -->
        <li class="menu-item {{ Request::segment(1) === 'visitor-timeline' ? 'active' : '' }}">
            <a href="{{ url('visitor-timeline') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-timeline"></i>
                <div data-i18n="Visitors Timeline">Visitors Timeline</div>
            </a>
        </li>
        <!-- Users -->
        <li class="menu-item {{ Request::segment(1) === 'users' ? 'active' : '' }}">
            <a href="{{ url('users') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user-circle"></i>
                <div data-i18n="Users">Users</div>
            </a>
        </li>
        <!--Settings -->
        <li class="menu-item {{ Request::segment(1) === 'settings' ? 'active' : '' }}">
            <a href="{{ url('settings') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
        </li>
    </ul>
</aside>

  <!-- / Menu -->