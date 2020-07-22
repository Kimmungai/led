<div class="left-side sticky-left-side">

  <!--logo and iconic logo start-->
  <div class="logo">
    <h1><a href="/">{!! env('APP_NAME_HTML','Ledamcha') !!} </a></h1>
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
        <li class="menu-list @if(Route::is('stock*')) act @endif">
          <a href="{{route('customers.index')}}"><i class="fa fa-clipboard-list"></i>
            <span>Listings</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('customers.index')) active @endif"><a href="{{route('customers.index')}}">Open all</a> </li>
              <li class="@if(Route::is('customers.create')) active @endif"><a href="{{route('customers.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('agent*')) act @endif">
          <a href="{{route('agent.index')}}"><i class="fa fa-users"></i>
            <span>Agents</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('agent.index')) active @endif"><a href="{{route('agent.index')}}">Open all</a> </li>
              <li class="@if(Route::is('agent.create')) active @endif"><a href="{{route('agent.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('suppliers*')) act @endif">
          <a href="{{route('suppliers.index')}}"><i class="fa fa-user-check"></i>
            <span>Clients</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('suppliers.index')) active @endif"><a href="{{route('suppliers.index')}}">Open all</a> </li>
              <li class="@if(Route::is('suppliers.create')) active @endif"><a href="{{route('suppliers.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="@if(Route::is('invoice*')) act @endif">
          <a href="{{route('invoices.index')}}"><i class="fa fa-file-invoice"></i>
            <span>Invoices</span></a>
            <!--<ul class="sub-menu-list">
              <li class="@if(Route::is('invoices.index')) active @endif"><a href="{{route('invoices.index')}}">Open all</a> </li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">Add new</a></li>
            </ul>-->
        </li>
        <li class="menu-list @if(Route::is('report*')) act @endif">
          <a href="{{route('report.index')}}"><i class="fa fa-chart-bar"></i>
            <span>Reports</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('invoices.index')) active @endif"><a href="{{route('invoices.index')}}">Listings</a> </li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">Agents</a></li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">Clients</a></li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">P & L</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('users*') || Route::is('staff*') || Route::is('admin*') || Route::is('business-card*')) act @endif"><a href="{{route('users.index')}}"><i class="fa fa-user-tie"></i> <span>Users</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('staff.index')) active @endif"><a href="{{route('staff.index')}}">Staff</a> </li>
            <li class="@if(Route::is('admin.index')) active @endif"><a href="{{route('admin.index')}}">Admin</a></li>
            <li class="@if(Route::is('users.create')) active @endif"><a href="{{route('users.create')}}">Add new</a></li>
          </ul>
        </li>
        <li class="menu-list @if( Route::is('post*') ) act @endif"><a href="{{route('post.index')}}"><i class="fa fa-globe"></i> <span>Blog</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('post.index')) active @endif"><a href="{{route('post.index')}}">All posts</a> </li>
            <li class="@if(Route::is('post.create')) active @endif"><a href="{{route('post.create')}}">Add new</a></li>
          </ul>
        </li>
        <li class="@if(Route::is('logout*')) act @endif"><a href="#" onclick="submit_form('logout-form')"><i class="fas fa-sign-out-alt"></i> <span>Log out</span></a></li>
        <!--<li class="@if(Route::is('trash.index')) act @endif"><a href="{{route('trash.index')}}"><i class="fa fa-trash-alt"></i> <span>Trash</span></a></li>-->
      </ul>
    <!--sidebar nav end-->
  </div>
</div>
