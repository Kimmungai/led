@if( isset($tab['link']) )
<a href="{{$tab['link']}}">
@endif

<div class="col-md-3 widget widget">
  <div class="r3_counter_box">
    <i class="{{$tab['icon']}}"></i>
    <div class="stats">
      @if(isset($tab['model']))
          <h5>@if(isset($tab['model']->data)) {{count($tab['model']->data)}} @else  {{count($tab['model'])}} @endif<span>.</span></h5>
      @endif
      <div class="grow {{$tab['class']}}">
      <p>{{$tab['name']}}</p>
      </div>
    </div>
  </div>
</div>

@if( isset($tab['link']) )
</a>
@endif
