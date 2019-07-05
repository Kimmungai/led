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
        <li class="@if(Route::is('invoices.all')) active @endif">
          <a href="#"><i class="fa fa-tags"></i>
            <span>Sales</span></a>
            <ul class="sub-menu-list">
              <li><a href="grids.html">Open all</a> </li>
              <li><a href="widgets.html">Add new</a></li>
            </ul>
        </li>
        <li class="">
          <a href="#"><i class="fa fa-clipboard-check"></i>
            <span>Purchases</span></a>
            <ul class="sub-menu-list">
              <li><a href="grids.html">Open all</a> </li>
              <li><a href="widgets.html">Add new</a></li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-clipboard-list"></i> <span>Stock</span></a></li>
        <li class="">
          <a href="#"><i class="fa fa-users"></i>
            <span>Customers</span></a>
            <ul class="sub-menu-list">
              <li><a href="grids.html">Open all</a> </li>
              <li><a href="widgets.html">Add new</a></li>
            </ul>
        </li>
        <li class="@if(Route::is('invoice*')) active @endif">
          <a href="{{route('invoices.all')}}"><i class="fa fa-file-invoice"></i>
            <span>Invoices</span></a>
            <ul class="sub-menu-list">
              <li><a href="{{route('invoices.all')}}">Open all</a> </li>
              <li class="@if(Route::is('invoices.new')) active @endif"><a href="{{route('invoices.new')}}">Add new</a></li>
            </ul>
        </li>
        <li class=""><a href="#"><i class="fa fa-user-tie"></i> <span>Users</span></a>
          <ul class="sub-menu-list">
            <li><a href="inbox.html">Staff</a> </li>
            <li><a href="compose-mail.html">Admin</a></li>
          </ul>
        </li>
        <li class=""><a href="#"><i class="fa fa-chart-area"></i> <span>Reports</span></a>
          <ul class="sub-menu-list">
            <li><a href="charts.html">Quick reports</a> </li>
            <li><a href="charts.html">Detailed reports</a> </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-trash-alt"></i> <span>Trash</span></a></li>
      </ul>
    <!--sidebar nav end-->
  </div>
</div>
