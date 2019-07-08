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

        <h3 class="text-uppercase text-center">Record a new sale</h3>

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>route('sales.index'),'newSale'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="container">
          <div class="row">

            <div class="col-md-8">
              <div class="products-selection-section">
                <!--search form-->
                <form class="" action="index.html" method="post">
                  <div class="form-group">
                    <div class="input-group input-icon right in-grp1">
                      <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                      </span>
                      <input  class="form-control1" type="text" placeholder="Search product...">
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </form>
                <!--end search form-->
                @Component('components.pos.tabs')@endcomponent

                <!--products-->
                  <div class="row">
                    @for($x = 0; $x < 6; $x++ )
                      @Component('components.products.single')@endcomponent
                    @endfor
                  </div>
                </div>
                <!--products end-->



              </div>

            <div class="col-md-4">
              @Component('components.pos.cart-preview')@endcomponent
            </div>

          </div>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
