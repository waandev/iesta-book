<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="{{ request()->is(Auth::user()->role_user->role_id === 1 ? 'customer/dashboard' : 'admin/dashboard') || request()->is(Auth::user()->role_user->role_id === 1 ? 'customer/dashboard/*' : 'admin/dashboard/*') ? 'active' : '' }}">
                <a
                    href="{{ Auth::user()->role_user->role_id === 1 ? route('customer.dashboard.index') : route('admin.dashboard.index') }}">
                    <i
                        class="{{ request()->is(Auth::user()->role_user->role_id === 1 ? 'customer/dashboard' : 'admin/dashboard') || request()->is(Auth::user()->role_user->role_id === 1 ? 'customer/dashboard/*' : 'admin/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i>
                    <span class="menu-title" data-i18n="eCommerce Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Ecommerce">Master Data</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Ecommerce"></i>
            </li>

            @if (Auth::user()->role_user->role_id === 2)
                <!-- Admin -->
                <li
                    class="{{ request()->is('backsite/publication') || request()->is('backsite/publication/*') || request()->is('backsite/*/publication') || request()->is('backsite/*/publication/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.publication.index') }}">
                        <i
                            class="{{ request()->is('backsite/publication') || request()->is('backsite/publication/*') || request()->is('backsite/*/publication') || request()->is('backsite/*/publication/*') ? 'bx bx-book bx-flashing' : 'bx bx-book' }}"></i>
                        <span class="menu-title" data-i18n="Shop">Publication</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role_user->role_id === 1)
                <!-- Customer -->
                <li class="nav-item"><a href="{{ route('customer.cart.index') }}"><i
                            class="la la-shopping-cart"></i><span class="menu-title" data-i18n="Shopping Cart">Shopping
                            Cart</span></a>
                </li>
                <li class="nav-item"><a href="{{ route('customer.transaction.index') }}"><i
                            class="la la-exchange"></i><span class="menu-title"
                            data-i18n="Transaction">Transaction</span></a>
                </li>
            @endif

        </ul>
    </div>
</div>

<!-- END: Main Menu-->

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
