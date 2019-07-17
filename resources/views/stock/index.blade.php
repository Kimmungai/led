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
        @Component('components.structure.page-title',['title'=>'All stock'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'stock'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="products-selection-section">
              <!--search form-->
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search product...'])@endcomponent
              <!--end search form-->
              @Component('components.pos.tabs')@endcomponent

              <!--products-->
                <div class="row">
                  @foreach($products as $product)
                    @Component('components.products.single',['paragraph'=>'','product'=>$product])@endcomponent
                  @endforeach
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  {{$products->links()}}
                </div>
              </div>
              <!--products end-->



            </div>


        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
