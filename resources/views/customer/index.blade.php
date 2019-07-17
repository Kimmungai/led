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
        @Component('components.structure.page-title',['title'=>'All customers'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'customers'=>''])
        @endcomponent

        <!--custom page design starts-->
          <div class="row">
            <!--search form-->
            <div class="col-md-12">
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search customer...'])@endcomponent
            </div>
            <!--end search form-->
          </div>
          <div class="row">
            @foreach($customers as $customer)
            <div class="col-md-3 mt-2">
              @Component('components.user.card',['user'=>$customer,'link' => route('customers.show',$customer->id)])@endcomponent
            </div>
            @endforeach
          </div>
          <div class="row">
            {{$customers->links()}}
          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection