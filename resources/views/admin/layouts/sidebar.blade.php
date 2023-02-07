@php
$settings = DB::table('settings')->first();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">{{ $settings->site_name }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.industry.index') }}"
                        class="nav-link {{ Request::routeIs('admin.industry.index') ? 'active' : '' }}">
                        <i class="fa fa-building"></i>
                        {{ __('Industry') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.location.index') }}"
                        class="nav-link {{ Request::routeIs('admin.location.index') ? 'active' : '' }}">
                        <i class="fa fa-location-dot"></i>
                        {{ __('Location') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.investment.index') }}"
                        class="nav-link {{ Request::routeIs('admin.investment.index') ? 'active' : '' }}">
                        <i class="fa fa-dollar"></i>
                        {{ __('Investment') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.franchises.index') }}"
                        class="nav-link {{ Request::routeIs('admin.franchises.index') ? 'active' : '' }} @yield('franchises_create')">
                        <i class="fa fa-file"></i>
                        {{ __('All Listing') }}
                    </a>
                </li>
                <li class="nav-item @yield('blogDropdown')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-pen"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview @yield('blockDropdownMenu')" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.category.index') }}"
                                class="nav-link  {{ Request::routeIs('admin.blog.category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.post.index') }}"
                                class="nav-link  {{ Request::routeIs('admin.blog.post.index') ? 'active' : '' }} @yield('post_create')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact.index') }}"
                        class="nav-link {{ Request::routeIs('admin.contact.index') ? 'active' : '' }} @yield('contact_view')">
                        <i class="fa fa-address-book"></i>
                        {{ __('Contact') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faq.index') }}"
                        class="nav-link {{ Request::routeIs('admin.faq.index') ? 'active' : '' }} @yield('faq_create')">
                        <i class="fa fa-question"></i>
                        {{ __('Faq') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cpage.index') }}"
                        class="nav-link {{ Request::routeIs('admin.cpage.index') ? 'active' : '' }} @yield('cpage_create')">
                        <i class=" fa fa-book"></i>
                        {{ __('Custom page') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}"
                        class="nav-link {{ Request::routeIs('admin.user.index') ? 'active' : '' }}">
                        <i class=" fa fa-users"></i>
                        {{ __('User') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link @yield('settings')">
                        <i class="fa fa-gear"></i>
                        {{ __('Settings') }}
                    </a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link @yield('admin-user')"><i
                    class=" fa fa-book"></i> {{ __('Admin User & Role') }}</a></li>

                <li class="nav-item"><a href="{{ route('admin.roles.index') }}" class="nav-link @yield('admin-roles')"><i
                            class=" fa fa-book"></i> {{ __('Admin Roles') }}</a></li>

                <li class="nav-item"><a href="{{ route('admin.permissions.index') }}"
                        class="nav-link @yield('admin-permissions')"><i class=" fa fa-book"></i>
                        {{ __('Admin permissions') }}</a></li>
            </ul>
        </nav>
    </div>
</aside>
