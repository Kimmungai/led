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
        @Component('components.structure.page-title',['title'=>'All suppliers'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'suppliers'=>''])
        @endcomponent

        <!--custom page design starts-->
          <div class="row">
            <!--search form-->
            <div class="col-md-12">
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search supplier...'])@endcomponent
            </div>
            <!--end search form-->
          </div>
          <div class="row">
            @foreach($suppliers as $supplier)
            <div class="col-md-3 mt-2">
              @Component('components.user.card',['user'=>$supplier,'link' => route('suppliers.show',$supplier->id)])@endcomponent
            </div>
            @endforeach
          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
