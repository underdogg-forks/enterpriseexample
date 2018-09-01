<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.frontend.sidebar.general') }}</li>
            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.frontend.sidebar.dashboard') }}</span>
                </a>
            </li>
            <li class="header">{{ trans('menus.frontend.sidebar.system') }}</li>
            {{ renderMenuItems(getMenuItems($type = 'frontend', $id = null)) }}
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>