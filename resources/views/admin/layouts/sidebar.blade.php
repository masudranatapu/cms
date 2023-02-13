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
                        class="nav-link @yield('dashboard')">
                        <i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.industry.index') }}"
                        class="nav-link {{ Request::routeIs('admin.industry.index') ? 'active' : '' }}">
                        <i class="fa fa-building"></i>
                        {{ __('Industry') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.location.index') }}"
                        class="nav-link {{ Request::routeIs('admin.location.index') ? 'active' : '' }}">
                        <i class="fa fa-location-dot"></i>
                        {{ __('Location') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.investment.index') }}"
                        class="nav-link {{ Request::routeIs('admin.investment.index') ? 'active' : '' }}">
                        <i class="fa fa-dollar"></i>
                        {{ __('Investment') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.franchises.index') }}"
                        class="nav-link {{ Request::routeIs('admin.franchises.index') ? 'active' : '' }} @yield('franchises_create')">
                        <i class="fa fa-file"></i>
                        {{ __('All Listing') }}
                    </a>
                </li> --}}
                <li class="nav-item @yield('blogDropdown')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-pen"></i>
                        <p> Blog <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview @yield('blockDropdownMenu')">
                        @if (Auth::user()->can('admin.blog-category.index'))
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-category.index') }}"
                                class="nav-link @yield('blog-category')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Category</p>
                            </a>
                        </li>
                        @endif

                        @if (Auth::user()->can('admin.blog-post.index'))
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-post.index') }}" class="nav-link  @yield('blog-post')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Post</p>
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>

                @if (Auth::user()->can('admin.category.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}"
                        class="nav-link @yield('category')">
                        <i class="fa fa-address-book"></i>
                        {{ __('Category') }}
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.subcategory.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.subcategory.index') }}"
                        class="nav-link @yield('subcategory')">
                        <i class="fa fa-address-book"></i>
                        {{ __('Sub Category') }}
                    </a>
                </li>
                @endif


                @if (Auth::user()->can('admin.contact.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.contact.index') }}"
                        class="nav-link  @yield('contact')">
                        <i class="fa fa-address-book"></i>
                        {{ __('Contact') }}
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.faq.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.faq.index') }}"
                        class="nav-link @yield('faq')">
                        <i class="fa fa-question"></i>
                        {{ __('Faq') }}
                    </a>
                </li>
                @endif

                @if (Auth::user()->can('admin.cpage.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.cpage.index') }}"
                        class="nav-link  @yield('cpage')">
                        <i class=" fa fa-book"></i>
                        {{ __('Custom page') }}
                    </a>
                </li>
                @endif

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.cpage.index') }}"
                        class="nav-link {{ Request::routeIs('admin.cpage.index') ? 'active' : '' }} @yield('cpage_create')">
                        <i class=" fa fa-award"></i>
                        {{ __('Brand') }}
                    </a>
                </li> --}}

                @if (Auth::user()->can('admin.brand.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.brand.index') }}"
                        class="nav-link  @yield('brand')">
                        <i class=" fa fa-award"></i>
                        {{ __('Brand') }}
                    </a>
                </li>
                @endif

{{--

                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link ">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Newsletter
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.newsletter.list') }}"
                                class="nav-link @yield('newsletter')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Email List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Send Mail</p>
                            </a>
                        </li>

                    </ul>
                </li> --}}


                @if (Auth::user()->can('admin.customer.index'))
                <li class="nav-item">
                    <a href="{{ route('admin.customer.index') }}"
                        class="nav-link @yield('customer')">
                        <i class=" fa fa-users"></i>
                        {{ __('Customer') }}
                    </a>
                </li>
                @endif




                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link @yield('settings')">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Settings<i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.General.general') }}"
                                class="nav-link">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.Language.index') }}" class="nav-link">
                                <i class="fas fa-globe nav-icon"></i>
                                <p>Language</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.Smtp.mail') }}"
                                class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>SMTP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.Currency.index') }}"
                                class="nav-link ">
                                <i class="fas fa-dollar-sign nav-icon"></i>
                                <p>Currency</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.MobileApp.index') }}"
                                class="nav-link">
                                <i class="fas fa-mobile nav-icon"></i>
                                <p>Mobile App Config</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link @yield('admin-user')"><i
                            class=" fa fa-book"></i> {{ __('Admin User & Role') }}</a></li>

                <li class="nav-item"><a href="{{ route('admin.roles.index') }}"
                        class="nav-link @yield('admin-roles')"><i class=" fa fa-book"></i> {{ __('Admin Roles') }}</a>
                </li>

                <li class="nav-item"><a href="{{ route('admin.permissions.index') }}"
                        class="nav-link @yield('admin-permissions')"><i class=" fa fa-book"></i>
                        {{ __('Admin permissions') }}</a></li>



            </ul>
        </nav>
    </div>
</aside>
