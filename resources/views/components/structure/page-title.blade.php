<h3 class="blank1">{!! $title !!}</h3>

@if (session('message'))
  <div  class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{{ session('message') }}</strong>
  </div>
@endif
@if (session('error'))
  <div  class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>{{ session('error') }}</strong>
  </div>
@endif
