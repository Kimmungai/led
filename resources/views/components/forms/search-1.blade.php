<!--search form-->
<form class="" action="{{$action}}" method="{{$method}}">
  <div class="form-group code-search">
    <div class="input-group input-icon right in-grp1">
      <span class="input-group-addon">
        <i class="fa fa-search"></i>
      </span>
      <input  class="form-control1 search-input" type="text" placeholder="{{$placeholder}}" @if(isset($keyup)) onkeyup="{{$keyup}}" @endif>
    </div>
    <div class="clearfix"> </div>
  </div>
</form>
<!--end search form-->
