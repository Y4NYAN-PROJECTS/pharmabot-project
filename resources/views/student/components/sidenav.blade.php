<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="">
                <div class="text-center">
                    <a href="index.html"><img src="{{asset('project-images/pharmabot-logo.jpg')}}" alt="Logo" style="width: auto; height: 100px;" /></a>
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

                {{-- [ Manage ] --}}
                <li class="sidebar-title">Manage</li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-robot"></i>
                        <span>Pharmabot</span>
                    </a>
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