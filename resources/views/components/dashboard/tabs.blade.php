@if( isset($tab['link']) )
<a href="{{$tab['link']}}">
@endif

<div class="col-md-3 widget widget">
  <div class="r3_counter_box">
    <i class="{{$tab['icon']}}"></i>
    <div class="stats">
      <h5>45 <span>%</span></h5>
      <div class="grow {{$tab['class']}}">
      <p>{{$tab['name']}}</p>
      </div>
    </div>
  </div>
</div>

@if( isset($tab['link']) )
</a>
@endif
