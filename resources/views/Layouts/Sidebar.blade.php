<!-- aside -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold ">Lab Laravel Standard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('projects.index') }}"
                        class="nav-link {{ Request::is('projects') ? 'active' : '' }}">
                        <i class="fa-solid fa-bars-progress mx-2"></i>
                        <p>
                            Projets
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tasks.index') }}"
                        class="nav-link {{ Request::is('tasks') || Request::is('task/*') ? 'active' : '' }}">
                        <i class="fa-solid fa-list-check mx-2"></i>
                        <p>
                            Tâches
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
