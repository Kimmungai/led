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
        @Component('components.structure.page-title',['title'=>'Record a new sale'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>route('sales.index'),'newSale'=>''])
        @endcomponent

        <!--custom page design starts-->
          <div class="row">

            <div class="col-md-8">
              <div class="products-selection-section">
                <!--search form-->
                @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search product...'])@endcomponent
                <!--end search form-->
                @Component('components.pos.tabs')@endcomponent

                <!--products-->
                  <div class="row">
                    @foreach($products as $product )
                      @Component('components.products.single',['product' => $product,'addClik' => 'add_prod_to_register(this.id,"register-preview")'])@endcomponent
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

            <div class="col-md-4">
              <?php $soldProds = []; ?>
              <?php if( session('soldProds') != null) {$soldProds = session('soldProds');}?>

              @Component('components.pos.cart-preview',['tableID' => 'register-preview','soldProds' => $soldProds])@endcomponent
              <h3 class="text-center">Customer details</h3>
              @if(!$customer)
              <a href="#" class="mt-2">create new customer</a>
              @endif
              <!--search form-->
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search customer...'])@endcomponent
              <!--end search form-->

              @Component('components.user.card-3',['user'=>$customer])@endcomponent

              @if( $customer )
              <form id="new-sale-form" class="" action="{{route('sales.store')}}" method="post" onsubmit="confirm_modal('newSaleConfirmModal')">
                @csrf
                <input type="hidden" name="" id="totalAmountDue" class=" form-control" value="@if(session('salePrice')){{session('salePrice')}}@else 0 @endif" />
                <input type="hidden" name="user_id" value="{{$customer->id}}">
                @Component('components.form-inputs.submit',['value' => 'Payment','icon'=>'fas fa-money-bill','classes'=>'btn btn-success btn-md mt-2  pay-btn'])@endcomponent
              </form>
              @endif

            </div>

          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new sale','question'=>'Are you sure you want to record sale?','modalID'=>'newSaleConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-sale-form'])@endcomponent

@endsection
