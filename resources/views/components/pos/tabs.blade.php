<ul class="nav nav-tabs nav-justified">
  <li @if(isset($type)) @if($type==0) class="active" @endif @endif onclick="open_prod_cat(0)"><a data-toggle="tab" href="#home6">All </a></li>
  <li @if(isset($type)) @if($type==1) class="active" @endif @endif onclick="open_prod_cat(1)"><a data-toggle="tab" href="#home5">Chicken</a></li>
  <li @if(isset($type)) @if($type==2) class="active" @endif @endif onclick="open_prod_cat(2)"><a data-toggle="tab" href="#menu4">Beef</a></li>
  <li @if(isset($type)) @if($type==3) class="active" @endif @endif onclick="open_prod_cat(3)"><a data-toggle="tab" href="#menu1">Fish</a></li>
  <li @if(isset($type)) @if($type==4) class="active" @endif @endif onclick="open_prod_cat(4)"><a data-toggle="tab" href="#menu2">Drumsticks</a></li>
  <li @if(isset($type)) @if($type==5) class="active" @endif @endif onclick="open_prod_cat(5)"><a data-toggle="tab" href="#menu3">Boneless</a></li>
</ul>
