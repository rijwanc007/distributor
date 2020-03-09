<ul class="sidebar-menu" data-widget="tree">
    <li class="header text-center">Navigation Option</li>
    <li class="treeview @yield('user')">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('all_user')"><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i>All User</a></li>
            <li class="@yield('create_user')"><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i>Create User</a></li>
            <li class="@yield('user_employee')"><a href="{{route('employee')}}"><i class="fa fa-circle-o"></i>Employee</a></li>
            <li class="@yield('user_vendor')"><a href="{{route('vendor')}}"><i class="fa fa-circle-o"></i>Vendor</a></li>
            <li class="@yield('user_distributor')"><a href="{{route('distributor')}}"><i class="fa fa-circle-o"></i>Distributor</a></li>
        </ul>
    </li>
    <li class="treeview @yield('product')">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Product & Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('product_categories')"><a href="{{route('product_category.index')}}"><i class="fa fa-circle-o"></i>Product Categories</a></li>
            <li class="@yield('brand_index')"><a href="{{route('brand.index')}}"><i class="fa fa-circle-o"></i>Brands</a></li>
{{--            <li class="@yield('tax_index')"><a href="{{route('tax.index')}}"><i class="fa fa-circle-o"></i>Taxes</a></li>--}}
        </ul>
    </li>
    <li class="treeview @yield('stock')">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('stock_in')"><a href="{{route('stock.index')}}"><i class="fa fa-circle-o"></i>Stock Index</a></li>
        </ul>
    </li>
    <li class="treeview @yield('offer')">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Offer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('offer_index')"><a href="{{route('offer.index')}}"><i class="fa fa-circle-o"></i>Offer Index</a></li>
        </ul>
    </li>
    <li class="treeview @yield('sale')">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Sale</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('sale_index')"><a href="{{route('sale.index')}}"><i class="fa fa-circle-o"></i>Sale Index</a></li>
            <li class="@yield('all_sale')"><a href="{{route('all.sale')}}"><i class="fa fa-circle-o"></i>All Sale</a></li>
        </ul>
    </li>
    <li class="treeview @yield('warehouse')">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Warehouse</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('stock_status')"><a href="{{route('warehouse.index')}}"><i class="fa fa-circle-o"></i>Stock Status</a></li>
        </ul>
    </li>
    <li class="treeview @yield('invoice')">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class=""><a href="{{route('warehouse.index')}}"><i class="fa fa-circle-o"></i>All Invoice</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class=""><a href="{{route('warehouse.index')}}"><i class="fa fa-circle-o"></i>All Invoice</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class=""><a href="{{route('warehouse.index')}}"><i class="fa fa-circle-o"></i>All Invoice</a></li>
        </ul>
    </li>
</ul>
