<div class="col-md-3 col-sm-4">
  <div class="wrimagecard wrimagecard-topimage">
      <a href="{{route('org.show',$org->id)}}">
      <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1);color:{{$color}};">
        <center><i class = "{{$icon}}"></i></center>
      </div>
      <div class="wrimagecard-topimage_title">
        <h4 class="text-center">{{$org->name}}</h4>
      </div>
    </a>
  </div>
</div>
