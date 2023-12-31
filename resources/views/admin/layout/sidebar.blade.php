<router-link to="/admin/dashboard" class="brand-link">
    <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">MRT</span>
</router-link>
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <router-link to="/admin/profile" class="d-block">Masud Rana Tapu</router-link>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <router-link to="/admin/dashboard" active-class="active" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </router-link>
            </li>
            <li class="nav-item menu-is-opening" active-class="menu-open">
                <a href="javascript:;" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Suppliers
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <router-link  to="/admin/suppliers" active-class="active" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Suppliers List</p>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <router-link to="/admin/appointment" active-class="active" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Appointment
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/users" active-class="active" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/settings" active-class="active" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Settings
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/profile" active-class="active" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profile
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/admin/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </router-link>
            </li>
        </ul>
    </nav>
</div>
