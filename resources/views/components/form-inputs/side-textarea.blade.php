<div class="form-group @if ($errors->has($name)) has-error @endif">
  <div class="@if ($errors->has($name)) col-md-10 @else col-md-12 @endif">
    <div class="input-group input-icon right in-grp1">
      <span class="input-group-addon">
        <i class="{{$icon}}"></i>
      </span>
      <textarea id="{{$name}}" name="{{$name}}" class="form-control" placeholder="{{$placeholder}}" cols="$cols" rows="{{$rows}}">@if(old($name)){{old($name)}}@elseif(isset($value)){{$value}}@endif</textarea>
    </div>
  </div>
  @if ($errors->has($name))
    <div class="col-sm-2 jlkdfj1">
      <p class="help-block">{{ $errors->first($name) }}</p>
    </div>
  @endif
  <div class="clearfix"> </div>
</div>
