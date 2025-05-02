<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="">
                <div class="text-center">
                    <a href="index.html"><img src="{{asset('project-images/pharmabot-logo.jpg')}}" alt="Logo"
                            style="width: auto; height: 100px;" /></a>
                    <h6 class="mt-3 text-center">Pharmabot System</h6>
                </div>

                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                {{-- [ Dashboard ] --}}
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ url('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- [ Accounts ] --}}
                <li class="sidebar-title">Accounts</li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.admin-list') }}" class="sidebar-link">
                        <i class="bi bi-shield-shaded"></i>
                        <span>Admin</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.student-list') }}" class="sidebar-link">
                        <i class="bi bi-mortarboard"></i>
                        <span>Student</span>
                    </a>
                </li>
                {{-- [ Pending Accounts ] --}}
                <li class="sidebar-title">Pending Accounts</li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.admin-pending') }}" class="sidebar-link">
                        <i class="bi bi-shield-shaded"></i>
                        <span>Admin</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.student-pending') }}" class="sidebar-link">
                        <i class="bi bi-mortarboard"></i>
                        <span>Student</span>
                    </a>
                </li>
                {{-- [ Manage ] --}}
                <li class="sidebar-title">Manage</li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.medicine') }}" class="sidebar-link">
                        <i class="bi bi-capsule"></i>
                        <span>Medicine</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-robot"></i>
                        <span>Pharmabot</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item  ">
                            <a href="extra-component-avatar.html" class="submenu-link">Analytics</a>
                        </li>

                        <li class="submenu-item  ">
                            <a href="extra-component-avatar.html" class="submenu-link">History</a>
                        </li>
                    </ul>
                </li>

                {{-- [ Settings ] --}}
                <li class="sidebar-title">Settings</li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-person-bounding-box"></i>
                        <span>Update Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-asterisk"></i>
                        <span>Update Password</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-envelope-at"></i>
                        <span>Update Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
