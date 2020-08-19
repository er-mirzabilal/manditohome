<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="{{route('index')}}">
        <div class="sidebar-brand-icon">
            <img style="width:40px" src="{{asset('img/logo/admin-icon.png')}}" alt="logo-icon">
        </div>
        <div class="sidebar-brand-text mx-3"><img style="width:150px;" src="{{asset('img/logo/admin-logo.png')}}" alt="logo"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if( Route::currentRouteName() == 'adminhome'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('adminhome')}}">
            <i class="fa fa-fw fa-tachometer"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Charts -->
    <li class="nav-item @if( Route::currentRouteName() == 'vieworder'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('vieworder')}}">
            <i class="fa fa-table fa-2x"></i>
            <span>View Orders</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item @if( Route::currentRouteName() == 'viewarea'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('viewarea')}}">
            <i class="fa fa-home"></i>
            <span>View Delivery Areas</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item @if( Route::currentRouteName() == 'viewcategory'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('viewcategory')}}">
            <i class="fa fa-list-alt"></i>
            <span>View Categories</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item @if( Route::currentRouteName() == 'viewcustomers'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('viewcustomers')}}">
            <i class="fa fa-users"></i>
            <span>All Customers</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item @if( Route::currentRouteName() == 'viewproducts'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('viewproducts')}}">
            <i class="fa fa-list"></i>
            <span>View Products</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item @if( Route::currentRouteName() == 'addproduct'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('addproduct')}}">
            <i class="fa fa-plus"></i>
            <span>Add Product</span></a>
    </li>

    <li class="nav-item @if( Route::currentRouteName() == 'viewsettings'){{ 'active' }}@endif">
        <a class="nav-link" href="{{route('viewsettings')}}">
            <i class="fa fa-cog fa-2x"></i>
            <span>Settings</span></a>
    </li>



    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
