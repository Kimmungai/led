<div class="form-group">
  <div class="col-md-6 col-md-offset-3">
    <button type="{{$type}}" class="{{$classes}}" @if(isset($click)) onclick="{{$click}}" @endif><i class="{{$icon}}"></i> {{$value}}</button>
  </div>
  <div class="clearfix"> </div>
</div>
