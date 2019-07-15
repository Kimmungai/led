<div class="form-group">
  <div class="col-md-6">
    <button type="{{$type}}" class="{{$classes}}" @if(isset($click)) onclick="{{$click}}" @endif @if(isset($toolTip)) title="{{$toolTip}}" @endif @if(isset($disabled)) disabled @endif><i class="{{$icon}}"></i> {{$value}}</button>
  </div>
  <div class="clearfix"> </div>
</div>
