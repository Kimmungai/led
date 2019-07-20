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
        @Component('components.structure.page-title',['title'=>'Inventory'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Inventory'])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="products-selection-section">
              <!--search form-->
              @Component('components.forms.search-1',['action'=>'','method'=>'','placeholder'=>'Search product...'])@endcomponent
              <!--end search form-->
              <!--@Component('components.pos.tabs',['type'=>$type])@endcomponent-->

              <!--products-->
                <div class="row">
                  <!--@foreach($products as $product)
                    @Component('components.products.single',['paragraph'=>'','product'=>$product])@endcomponent
                  @endforeach-->
                  @Component('components.pos.cart-preview',['tableID' => 'register-preview','soldProds' => $products])@endcomponent

                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  {{$products->links()}}
                </div>
              </div>
              <!--products end-->

              <a href="#" class="btn btn-info br0 pull-right">
                Update
              </a>

            </div>


        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
