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
        <li class="menu-list @if(Route::is('payment*')) act @endif">
          <a href="{{route('payment.index')}}"><i class="fa fa-tags"></i>
            <span>Sales</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('payment.index')) active @endif"><a href="{{route('payment.index')}}">Open all</a> </li>
              <li class="@if(Route::is('payment.create')) active @endif"><a href="{{route('payment.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('listing*')) act @endif">
          <a href="{{route('listing.index')}}"><i class="fa fa-clipboard-list"></i>
            <span>Listings</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('listing.index')) active @endif"><a href="{{route('listing.index')}}">Open all</a> </li>
              <li class="@if(Route::is('listing.create')) active @endif"><a href="{{route('listing.create')}}">Add new</a></li>
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
        <li class="menu-list @if(Route::is('client*')) act @endif">
          <a href="{{route('suppliers.index')}}"><i class="fa fa-user-check"></i>
            <span>Clients</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('client.index')) active @endif"><a href="{{route('client.index')}}">Open all</a> </li>
              <li class="@if(Route::is('client.create')) active @endif"><a href="{{route('client.create')}}">Add new</a></li>
            </ul>
        </li>
        <!--<li class="menu-list @if(Route::is('report*')) act @endif">
          <a href="{{route('report.index')}}"><i class="fa fa-chart-bar"></i>
            <span>Reports</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('invoices.index')) active @endif"><a href="{{route('invoices.create')}}">Listings</a> </li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">Agents</a></li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">Clients</a></li>
              <li class="@if(Route::is('invoices.create')) active @endif"><a href="{{route('invoices.create')}}">P & L</a></li>
            </ul>
        </li>-->
        <li class="menu-list @if(Route::is('users*') || Route::is('staff*') || Route::is('admin*') || Route::is('business-card*')) act @endif"><a href="{{route('users.index')}}"><i class="fa fa-user-tie"></i> <span>Users</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('staff.index')) active @endif"><a href="{{route('staff.index')}}">Staff</a> </li>
            <li class="@if(Route::is('admin.index')) active @endif"><a href="{{route('admin.index')}}">Admin</a></li>
            <li class="@if(Route::is('users.create')) active @endif"><a href="{{route('users.create')}}">Add new</a></li>
          </ul>
        </li>
        <li class="menu-list @if(Route::is('subscription*')) act @endif">
          <a href="{{route('subscription.index')}}"><i class="fa fa-gift"></i>
            <span>Packages</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('subscription.index')) active @endif"><a href="{{route('subscription.index')}}">Open all</a> </li>
              <li class="@if(Route::is('subscription.create')) active @endif"><a href="{{route('subscription.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if(Route::is('post*')) act @endif">
          <a href="{{route('post.index')}}"><i class="fa fa-globe"></i>
            <span>Blog</span></a>
            <ul class="sub-menu-list">
              <li class="@if(Route::is('post.index')) active @endif"><a href="{{route('post.index')}}">Open all</a> </li>
              <li class="@if(Route::is('post.create')) active @endif"><a href="{{route('post.create')}}">Add new</a></li>
            </ul>
        </li>
        <li class="menu-list @if( Route::is('home-page*')) act @endif"><a href="{{route('home-page.index')}}"><i class="fa fa-edit"></i> <span>Pages</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('home-page.index')) active @endif"><a href="{{route('home-page.index')}}">Home</a></li>
            <!--<li class="@if(Route::is('property-listing-page.index')) active @endif"><a href="{{route('property-listing-page.index')}}">Property listing</a> </li>
            <li class="@if(Route::is('property-mgt-page.index')) active @endif"><a href="{{route('property-mgt-page.index')}}">Property management</a> </li>
            <li class="@if(Route::is('about-page.index')) active @endif"><a href="{{route('about-page.index')}}">About</a> </li>-->
          </ul>
        </li>
        <li class="menu-list @if( Route::is('settings*') ||  Route::is('faq*') ||  Route::is('contact*')) act @endif"><a href="{{route('settings.page')}}"><i class="fa fa-cog"></i> <span>Settings</span></a>
          <ul class="sub-menu-list">
            <li class="@if(Route::is('settings.costs')) active @endif"><a href="{{route('settings.costs')}}">Advertising costs</a></li>
            <li class="@if(Route::is('contact.index')) active @endif"><a href="{{route('contact.index')}}">Contacts</a> </li>
            <li class="@if(Route::is('faq.index')) active @endif"><a href="{{route('faq.index')}}">Faqs</a> </li>

          </ul>
        </li>
        <li class="@if(Route::is('logout*')) act @endif"><a href="#" onclick="submit_form('logout-form')"><i class="fas fa-sign-out-alt"></i> <span>Log out</span></a></li>
      </ul>
    <!--sidebar nav end-->
  </div>
</div>
