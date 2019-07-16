<div class="form-group @if ($errors->has($name)) has-error @endif">
  @if( !isset($noLabel) )
  <label class="col-md-2 control-label" style="line-height:35px;text-overflow:ellipse">{{$title}}</label>
  @endif
  <div class="@if( !isset($noLabel) ) col-md-8 @else col-md-12 @endif">
    <div class="input-group input-icon right in-grp1">
      <span class="input-group-addon">
        <i class="{{$icon}}"></i>
      </span>
      <select id="{{$name}}" name="{{$name}}" class="form-control1" @if(isset($disabled)) disabled @endif >
        @foreach($options as $option)
          <option value="{{$option->id}}" @if(isset($selected)) @if($selected == $option->id ) selected @endif @endif>{{$option->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  @if ($errors->has($name))
    <div class="col-sm-2 jlkdfj1">
      <p class="help-block">{{ $errors->first($name) }}</p>
    </div>
  @endif
  <div class="clearfix"> </div>
</div>
