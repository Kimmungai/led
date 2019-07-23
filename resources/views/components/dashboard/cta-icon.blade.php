<div class="col-md-3 col-sm-4">
  <div class="wrimagecard wrimagecard-topimage">
      <a href="@if(isset($link)){{$link}}@elseif(isset($org)){{route('org.show',$org->id)}}@endif">
      <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1);color:{{$color}};">
        <center><i class = "{{$icon}}"></i></center>
      </div>
      <div class="wrimagecard-topimage_title">
        <h4 class="text-center">@if(isset($org)){{$org->name}}@elseif(isset($title)){{$title}}@endif</h4>
        @if(isset($status))
        <h5 class="text-center">{{$status}} @if(isset($amount)) (<small>ksh. </small>{{number_format($amount,2)}}) @endif</h5>
        @endif

      </div>
    </a>
  </div>

@if(isset($selectable))
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
      <input type="checkbox" name="" value="{{$invoice->id}}">
    </div>
  </div>
@endif

</div>
