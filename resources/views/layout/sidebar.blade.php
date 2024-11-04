<li class="nav-item menu-items">
    <a class="nav-link" href="{{ auth()->user()->role == 'admin' ? route('tampilan_awal') : route('userdash') }}">
        <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">
            {{ auth()->user()->role == 'admin' ? 'Admin Dashboard' : 'User Dashboard' }}
        </span>
    </a>
</li>

<!-- <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Basic UI Elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>
                </li> -->
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ auth()->user()->role == 'admin' ? route('admin_list') : route('list_project') }}">
        <span class="menu-icon">
            <i class="mdi mdi-list-box"></i>
        </span>
        <span class="menu-title">
            {{ auth()->user()->role == 'admin' ? 'Daftar Admin' : 'List Project' }}
        </span>
        <i class="menu-arrow"></i>
    </a>
</li>

@if(auth()->user()->role == 'admin')
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('rekrutment') }}">
        <span class="menu-icon">
            <i class="mdi mdi-account-group"></i>
        </span>
        <span class="menu-title">
            Rekrutmen
        </span>
        <i class="menu-arrow"></i>
    </a>
</li>
@endif


<!-- <li class="nav-item menu-items">
                    <a class="nav-link" href="../../pages/tables/basic-table.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Tables</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li> -->
<!-- <li class="nav-item menu-items">
                    <a class="nav-link" href="../../pages/charts/chartjs.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">Charts</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li> -->
<!-- <li class="nav-item menu-items">
                    <a class="nav-link" href="../../pages/icons/font-awesome.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li> -->
<!-- <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 505 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                        </ul>
                    </div>
                </li> -->
<!-- <li class="nav-item menu-items">
                    <a class="nav-link" href="../../docs/documentation.html">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document"></i>
                        </span>
                        <span class="menu-title">Documentation</span>
                    </a>
                </li> -->