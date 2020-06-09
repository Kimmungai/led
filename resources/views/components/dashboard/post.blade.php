<div class="col-md-3 col-sm-4">
  <div class="wrimagecard wrimagecard-topimage" style="padding-bottom:2em;">
      <a href="@if(isset($link)){{$link}}@elseif(isset($org)){{route('org.show',$org->id)}}@endif">
      <div class="wrimagecard-topimage_header" style="background-image: url({{$post->featured_img_uri}});">
        @if($post->published)
        <i style="font-size:2em;@if(isset($color))color:{{$color}}@endif" class = "{{$icon}}"></i>
        @else
        <i style="font-size:2em;" class = "fa fa-edit"></i>
        @endif
      </div>
      <div class="wrimagecard-topimage_title blog-card" >
        <h4 class="text-center">@if(isset($title)){{$title}}@endif</h4>
        <div class="row">
          <div class="col-xs-6">
            <h5><span class="fa fa-comments"></span> {{$post->comments()->count()}}</h5>
          </div>
          <div class="col-xs-6">
            <h5><span class="fa fa-calendar-alt"></span> {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</h5>
          </div>
        </div>
      </div>
    </a>
  </div>
@if(isset($selectable))
  <!--<div class="row">
    <div class="col-xs-4 col-xs-offset-4">
      <input type="checkbox" name="" value="{{$post->id}}" onchange="add_invoice_to_rpt(this.value)">
    </div>
  </div>-->
@endif

</div>
