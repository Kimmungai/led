<div class="header-section">

<!--toggle button start-->
<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
<!--toggle button end-->

<!--notification menu start -->
<div class="menu-right">
  <div class="user-panel-top">
    <div class="profile_details_left">
      <!--search-->
      <form class="" action="index.html" method="post">
        <input type="text" class="form-control" name="" value="" placeholder="search..">
      </form>
      <!--end search-->
    </div>
    <div class="profile_details">
      <ul>
        <li class="dropdown profile_details_drop">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <div class="profile_img">
              @if( Auth::user()->avatar )
                <span style="background:url({{Auth::user()->avatar}}) no-repeat center"> </span>
              @else
                @if( Auth::user()->gender == 1  )
                  <span style="background:url({{url('placeholders/avatar-male.png')}}) no-repeat center"> </span>
                @else
                  <span style="background:url({{url('placeholders/avatar-female.png')}}) no-repeat center"> </span>
                @endif
              @endif
               <div class="user-name">
                <p>{{Auth::user()->name}}<span>{{Auth::user()->designation}}</span></p>
               </div>
               <i class="lnr lnr-chevron-down"></i>
               <i class="lnr lnr-chevron-up"></i>
              <div class="clearfix"></div>
            </div>
          </a>
          <ul class="dropdown-menu drp-mnu">
            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
            <li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li>
            <li> <a href="#" onclick="submit_form('logout-form')"><i class="fas fa-sign-out-alt"></i> Logout</a> </li>
          </ul>
        </li>
        <div class="clearfix"> </div>
      </ul>
    </div>

    <div class="clearfix"></div>
  </div>
  </div>
<!--notification menu end -->
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
