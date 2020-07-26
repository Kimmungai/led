@extends('layouts.app')

@section('content')
 <body class="sticky-header left-side-collapsed">
    <section>

    <!-- left side start-->
    @Component('components.structure.side-menu')
    @endcomponent
    <!-- left side end-->

		<!-- main content start-->
		<div class="main-content">

			<!-- header-starts -->
      @Component('components.structure.header-menu')
      @endcomponent
		 <!-- //header-ends -->

     <!--body wrapper start-->
			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'All costs'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Advertising costs'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>Serial</th>
              <th>Property type</th>
              <th>Advertising cost</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach($costs as $cost)
              <tr>
                <form class="" action="{{route('settings.costs',$cost->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <td>{{$cost->id}}</td>
                  <td>
                    @if($cost->meta ==1 )
                    Commercial
                    @elseif( $cost->meta == 2 )
                      Residential
                    @elseif( $cost->meta == 3 )
                      Agricultural
                    @elseif( $cost->meta == 4 )
                      Industrial
                    @endif
                    <input type="hidden" name="meta" value="{{$cost->meta}}">
                  </td>
                  <td> <input class="form-control" type="number" min="0" name="meta_val" value="{{$cost->meta_val}}" style="max-width:150px"/> </td>
                  <td> <button type="submit" class="btn btn-default btn-sm" title="save details">Update</button> </td>
                </form>
              </tr>
              @endforeach

              <!--<form class="" action="{{route('settings.costs',3)}}" method="post">
                @csrf
                @method('PUT')
                <td>1</td>
                <td>Commercial <input type="hidden" name="meta" value="4"> </td>
                <td> <input class="form-control" type="number" min="0" name="meta_val" value="400" style="max-width:150px"/> </td>
                <td> <button type="submit" class="btn btn-default btn-sm" title="save details">Update</button> </td>
              </form>-->
            </tbody>
          </table>
        </div>
        <!--custom page design ends-->

        <div class="row">
          <div class="col-md-12">

          </div>
        </div>

			</div>
			 <!--body wrapper end-->
		</div>

@endsection
