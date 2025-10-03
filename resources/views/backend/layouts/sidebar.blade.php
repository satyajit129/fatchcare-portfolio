<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <div class="app-brand">
            <a href="{{ route('adminDashboard') }}" title="Dashboard">
                <span class="brand-name text-truncate">{{ $settings->website_name }}</span>
            </a>
        </div>
        <div class="sidebar-scrollbar">
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="{{ Route::is('adminDashboard') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('adminDashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- FAQ -->
                <li class="{{ Route::is('adminFAQ', 'adminFAQCreateOrEdit') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('adminFAQ') }}">
                        <i class="mdi mdi-frequently-asked-questions"></i>
                        <span class="nav-text">FAQ</span>
                    </a>
                </li>

                                <!-- Settings -->
                <li class="{{ Route::is('adminSettings') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('adminSettings') }}">
                        <i class="mdi mdi-cog-outline"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
