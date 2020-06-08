<div class="form-group @if ($errors->has($name)) has-error @endif @if(isset($classes)) {{$classes}} @endif">
  <div class="">

    <div class="input-group in-grp1">
      <input id="{{$name}}" name="{{$name}}" class="form-control" type="{{$type}}"   placeholder="{{$placeholder}}" onkeyup="check_if_recored_attribute(event,'{{$name}}')">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="add_post_attribute('{{$name}}')">{{$action}}</button>
      </span>
    </div>

  </div>
  @if ($errors->has($name))
    <div class="col-sm-2 jlkdfj1">
      <p class="help-block">{{ $errors->first($name) }}</p>
    </div>
  @endif
  <div class="clearfix"> </div>
</div>
