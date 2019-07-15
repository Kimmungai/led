<div class="form-group">
  <div class="col-md-6">
    <button type="submit" class="{{$classes}}" name="button" @if(isset($toolTip)) title="{{$toolTip}}" @endif><i class="{{$icon}}"></i> {{$value}}</button>
  </div>
  <div class="clearfix"> </div>
</div>
