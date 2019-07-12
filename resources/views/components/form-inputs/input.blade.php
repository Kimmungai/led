<div class="form-group @if ($errors->has($name)) has-error @endif">
  <label class="col-md-2 control-label" style="line-height:35px;text-overflow:ellipse">{{$title}} @if($required) <span class="text-danger">*</span> @endif</label>
  <div class="col-md-8">
    <div class="input-group input-icon right in-grp1">
      <span class="input-group-addon">
        <i class="{{$icon}}"></i>
      </span>
      <input id="{{$name}}" name="{{$name}}" class="form-control1" type="{{$type}}" placeholder="{{$placeholder}}" @if($required) required @endif>
    </div>
  </div>
  @if ($errors->has($name))
    <div class="col-sm-2 jlkdfj1">
      <p class="help-block">{{ $errors->first($name) }}</p>
    </div>
  @endif
  <div class="clearfix"> </div>
</div>
