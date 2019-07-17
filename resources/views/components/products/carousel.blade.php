<div class="item @if($active) @else active @endif">
  <div class="col-xs-2"><a href="#" title="{{$product->name}}"><img src="@if($product->img1) {{url($product->img1)}} @else /placeholders/s1.png @endif" class="img-responsive" style="height:75px;width:75px;"></a></div>
</div>
