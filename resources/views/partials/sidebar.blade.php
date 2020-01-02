@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/img/prod-2.jpg')  }}" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">NAVAN TRADING</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar.png')  }}" class="img-circle elevation-2" alt="">
            </div>
            <div class="info">
                <a href="" class="d-block">Md Ushaed</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{$prefix == '/role'? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{$prefix == '/role'? 'active' : ''}}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                            Role Management
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('role.create') }}"
                               class="nav-link {{$route == 'role.create'?'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" id="manage_users_sidebar"
                               class="nav-link {{ $route == 'role.index' ? 'active': '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ $prefix == '/permissions' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $prefix == '/permissions' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chess"></i>
                        <p>
                            Permission
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('permissions.create') }}"
                               class="nav-link {{ $route == 'permissions.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Permission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" id="manage_categories_sidebar"
                               class="nav-link {{ $route == 'permissions.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
{{--                <li class="nav-item has-treeview {{ $prefix == '/products' ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link {{ $prefix == '/products' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-feather"></i>--}}
{{--                        <p>--}}
{{--                            Products--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                            <span class="badge badge-info right"></span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        @if($user['data']['user_type'] == 'manager')--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('products.create') }}"--}}
{{--                               class="nav-link {{ $route == 'products.create' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Add Products</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @endif--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('products.index') }}" id="manage_products_sidebar"--}}
{{--                               class="nav-link {{ $route == 'products.index' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Manage Products</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item has-treeview {{ $prefix == '/suppliers' ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link {{ $prefix == '/suppliers' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-mars-stroke-v"></i>--}}
{{--                        <p>--}}
{{--                            Supplier--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        @if($user['data']['user_type'] == 'manager')--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('suppliers.create') }}"--}}
{{--                               class="nav-link {{ $route == 'suppliers.create' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Add Supplier</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @endif--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('suppliers.index') }}" id="manage_suppliers_sidebar"--}}
{{--                               class="nav-link {{ $route == 'suppliers.index' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Manage Suppliers</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item has-treeview {{ $prefix == '/purchases' ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link {{ $prefix == '/purchases' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-cart-plus"></i>--}}
{{--                        <p>--}}
{{--                            Purchase--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}

{{--                    <ul class="nav nav-treeview">--}}
{{--                        @if($user['data']['user_type'] == 'manager')--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('purchases.create') }}"--}}
{{--                               class="nav-link {{ $route == 'purchases.create' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Add Purchase</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @endif--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('purchases.index') }}" id="manage_purchases_sidebar"--}}
{{--                               class="nav-link {{ $route == 'purchases.index' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Manage Purchase</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-item has-treeview {{ $prefix == '/stock' ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link {{ $prefix == '/stock' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-store-alt"></i>--}}
{{--                        <p>--}}
{{--                            Stock--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('stock.index') }}" class="nav-link {{ $route == 'stock.index' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Current Stock</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('opening.stock.index') }}" class="nav-link {{ $route == 'opening.stock.index' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Opening Stock</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item has-treeview {{ $prefix == '/sales' ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link {{ $prefix == '/sales' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-cart-plus"></i>--}}
{{--                        <p>--}}
{{--                            Sales--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('sales.create') }}" class="nav-link {{ $route == 'sales.create' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Add Sales</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('sales.index') }}" class="nav-link {{ $route == 'sales.index' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Manage Sales</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-header">REPORTS</li>--}}
{{--                <li class="nav-item has-treeview {{ $prefix == '/reports' ? 'menu-open' : '' }}">--}}
{{--                    <a href="#" class="nav-link {{ $prefix == '/reports' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon far fa-chart-bar"></i>--}}
{{--                        <p>--}}
{{--                            Reports--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('reports.sales.daily') }}" class="nav-link {{ $route == 'reports.sales.daily' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Daily Report</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('reports.sales.monthly') }}" class="nav-link  {{ $route == 'reports.sales.monthly' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Monthly Report</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('reports.sales.yearly') }}" class="nav-link  {{ $route == 'reports.sales.yearly' ? 'active' : '' }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Yearly Report</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-header">COMPANY INFORMATION</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('companies.index') }}"--}}
{{--                       class="nav-link {{ $route == 'companies.index' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-building"></i>--}}
{{--                        <p>Company</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-header">PERSONAL INFORMATION</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('setting') }}" class="nav-link {{ $route == 'setting' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-tools"></i>--}}
{{--                        <p>Setting</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('profile') }}" class="nav-link {{ $route == 'profile' ? 'active' : '' }}">--}}
{{--                        <i class="nav-icon fas fa-user-alt"></i>--}}
{{--                        <p>Profile</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('logout') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-sign-out-alt"></i>--}}
{{--                        <p>Logout</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
