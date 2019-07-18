<div class="left-side sticky-left-side">

  <!--logo and iconic logo start-->
  <div class="logo">
    <h1><a href="/">{{env('APP_NAME','Ledamcha')}} <span>MIS</span></a></h1>
  </div>
  <div class="logo-icon text-center @if(Route::is('home')) active @endif">
    <a href="/"><i class="lnr lnr-home"></i> </a>
  </div>

  <!--logo and iconic logo end-->
  <div class="left-side-inner">

    <!--sidebar nav start-->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <!--<li class="active"><a href="/"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>-->
        <li class="menu-list @if(Route::is('sales*')) act @endif">
          <a href="{{route('sales.index')}}"><i class="fa fa-tags"></i>
            <span>Sales</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('sales.index')) active @endif"><a href="{{route('sales.index')}}">Open all</a> </li>
              <li class="@if(Route::is('sales.create')) active @endif"><a href="{{route('sales.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('purchases*')) act @endif">
          <a href="{{route('purchases.index')}}"><i class="fa fa-clipboard-check"></i>
            <span>Purchases</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('purchases.index')) active @endif"><a href="{{route('purchases.index')}}">Open all</a> </li>
              <li class="@if(Route::is('purchases.create')) active @endif"><a href="{{route('purchases.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="@if(Route::is('stock*')) act @endif"><a href="{{route('stock.index')}}"><i class="fa fa-clipboard-list"></i> <span>Stock</span></a></li>
        <li class="@if(Route::is('customers*')) act @endif">
          <a href="{{route('customers.index')}}"><i class="fa fa-users"></i>
            <span>Customers</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('customers.index')) active @endif"><a href="{{route('customers.index')}}">Open all</a> </li>
              <li class="@if(Route::is('customers.create')) active @endif"><a href="{{route('customers.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="@if(Route::is('suppliers*')) act @endif">
          <a href="{{route('suppliers.index')}}"><i class="fa fa-user-check"></i>
            <span>Suppliers</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('suppliers.index')) active @endif"><a href="{{route('suppliers.index')}}">Open all</a> </li>
              <li class="@if(Route::is('suppliers.create')) active @endif"><a href="{{route('suppliers.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('invoice*')) act @endif">
          <a href="{{route('invoices.index')}}"><i class="fa fa-file-invoice"></i>
            <span>Invoices</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('invoices.index')) active @endif"><a href="{{route('invoices.index')}}">Open all</a> </li>
              <!--<li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">Add new</a></li>-->
            </ul>
        </li>
        <li class="menu-list @if(Route::is('users*') || Route::is('staff*') || Route::is('admin*')) act @endif"><a href="{{route('users.index')}}"><i class="fa fa-user-tie"></i> <span>Users</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('staff.index')) active @endif"><a href="{{route('staff.index')}}">Staff</a> </li>
            <li class="@if(Route::is('admin.index')) active @endif"><a href="{{route('admin.index')}}">Admin</a></li>
            <li class="@if(Route::is('users.create')) active @endif"><a href="{{route('users.create')}}">Add new</a></li>
          </ul>
        </li>
        <li class="menu-list @if(Route::is('reports*') || Route::is('quick-reports*') || Route::is('detailed-reports*')) act @endif"><a href="{{route('reports.index')}}"><i class="fa fa-chart-area"></i> <span>Reports</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('quick-reports.index')) active @endif"><a href="{{route('quick-reports.index')}}">Quick reports</a> </li>
            <li class="@if(Route::is('detailed-reports.index')) active @endif"><a href="{{route('detailed-reports.index')}}">Detailed reports</a> </li>
          </ul>
        </li>
        <li class="@if(Route::is('org*')) act @endif">
          <a href="{{route('org.index')}}"><i class="fa fa-building"></i>
            <span>Organisation</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('org.index')) active @endif"><a href="{{route('org.index')}}">Open all</a> </li>
              <li class="@if(Route::is('org.create')) active @endif"><a href="{{route('org.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="@if(Route::is('trash.index')) act @endif"><a href="{{route('trash.index')}}"><i class="fa fa-trash-alt"></i> <span>Trash</span></a></li>
      </ul>
    <!--sidebar nav end-->
  </div>
</div>
