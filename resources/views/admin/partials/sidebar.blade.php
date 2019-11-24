<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="80" height="80" src="{{asset('frontend/images/avatars/default_user.jpg')}}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">Super Admin</p>
            <p class="app-sidebar__user-designation">admin@admin.com</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Transactions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ Route::currentRouteName() == 'admin.transactions.bookings' ? 'active' : '' }}" href="{{route('admin.transactions.bookings')}}"><i class="icon fa fa-circle-o"></i>Orders Payments</a></li>
                <li><a class="treeview-item {{ Route::currentRouteName() == 'admin.transactions.subscription' ? 'active' : '' }}" href="{{route('admin.transactions.subscription')}}"><i class="icon fa fa-circle-o"></i>Business Subscriptions</a></li>

            </ul>
        </li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                <i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Products</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Brands</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.attributes.index' ? 'active' : '' }}" href="{{ route('admin.attributes.index') }}">
                <i class="app-menu__icon fa fa-th"></i>
                <span class="app-menu__label">Attributes</span>
            </a>
        </li>
{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.shops.index' ? 'active' : '' }}" href="{{ route('admin.shops.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-th"></i>--}}
{{--                <span class="app-menu__label">Shops</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">User Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}" href="{{route('admin.users.index')}}"><i class="icon fa fa-circle-o"></i> Customers</a></li>
                <li><a class="treeview-item {{ Route::currentRouteName() == 'admin.sellers.index' ? 'active' : '' }}" href="{{route('admin.sellers.index')}}"><i class="icon fa fa-circle-o"></i> Sellers</a></li>
                <li><a class="treeview-item {{ Route::currentRouteName() == 'admin.show.index' ? 'active' : '' }}" href="{{route('admin.show.index')}}"><i class="icon fa fa-circle-o"></i>Admins</a></li>
            </ul>
        </li>
    </ul>
</aside>
