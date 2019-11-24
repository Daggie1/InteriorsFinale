<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img width="200" height="150" src="{{asset('frontend/images/avatars/default_user.jpg')}}" alt="User Image">





    </div>

    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'seller.dashboard' ? 'active' : '' }}" href="{{ route('seller.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
{{--        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bar-chart"></i><span class="app-menu__label">Orders</span><i class="treeview-indicator fa fa-angle-right"></i></a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li><a class="treeview-item {{Route::currentRouteName() == 'seller.orders.index' ? 'active' : '' }}" href="{{ route('seller.orders.index') }}"><i class="icon fa fa-check-circle"></i> Complete</a></li>--}}
{{--                <li><a class="treeview-item  {{Route::currentRouteName() == 'seller.orders.index' ? 'active' : '' }}" href="{{ route('seller.orders.index') }}"><i class="icon fa fa-retweet"></i> Pending</a></li>--}}
{{--                <li><a class="treeview-item  {{Route::currentRouteName() == 'seller.orders.index' ? 'active' : '' }}" href="{{ route('seller.orders.index') }}"><i class="icon fa fa-window-close"></i>Failed</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'seller.products.index' ? 'active' : '' }}" href="{{ route('seller.products.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-shopping-bag"></i>--}}
{{--                <span class="app-menu__label">Products</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'seller.transaction' ? 'active' : '' }}" href="{{ route('seller.transaction') }}">--}}
{{--                <i class="app-menu__icon fa fa-bar-chart"></i>--}}
{{--                <span class="app-menu__label">Transactions</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'seller.shop' ? 'active' : '' }}" href="{{ route('seller.shop') }}">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Shops</span>
            </a>
        </li>

    </ul>
</aside>
