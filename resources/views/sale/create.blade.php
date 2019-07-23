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
        @Component('components.structure.page-title',['title'=>'New sale'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>route('sales.index'),'newSale'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="purchase-main">

              <!--search form-->
              @Component('components.forms.search-1',['action'=>'','method'=>'','placeholder'=>'Product code...','keyup' => 'search_product(this.value,\'sold-prods\')'])@endcomponent
              @Component('components.search.results-panel',['action'=>'','method'=>'','placeholder'=>'Product code...'])@endcomponent
              <!--end search form-->


                <div class="panel-body no-padding mt-3">
                  <table class="table">
                    <thead>
                      <tr >
                        <th >Product name</th>
                        <th >Sale price</th>
                        <th >Sold (Kg)</th>
                      </tr>
                    </thead>
                    <tbody id="sold-prods">
                    <?php $soldProds = []; ?>
                    <?php if( session('soldProds') != null) {$soldProds = session('soldProds');}?>

                    @foreach ( $soldProds as $soldProd)
                      <tr data-id="{{$soldProd['id']}}" id="sold-product-{{$soldProd['id']}}">
                        <td data-name="{{$soldProd['name']}}" id="name-prod-{{$soldProd['id']}}" ><span class="fas fa-times-circle pointer" onclick="remove_row('sold-product-{{$soldProd['id']}}','sold-prods')"></span> {{$soldProd['name']}}</td>
                        <td  ><input id="cost-prod-{{$soldProd['id']}}" type="number" value="{{$soldProd['cost']}}" onchange="save_product_list('sold-prods')"/></td>
                        <td><input id="qty-prod-{{$soldProd['id']}}" type="number" value="{{$soldProd['qty']}}" onchange="save_product_list('sold-prods')"/></td>
                      </tr>
                   @endforeach

                    </tbody>

                  </table>

                </div>
              <form id="new-sale-form" class="" action="{{route('sales.store')}}" method="post" onsubmit="confirm_modal('newPurchaseConfirmModal')">
                @csrf
                <input type="hidden" name="" id="total-cost" class=" form-control" value="@if(session('salePrice')){{session('salePrice')}}@else 0 @endif" />
                <input type="hidden" name="user_id" value="@if(isset($supplier)){{$supplier->id}}@endif">

                <div class="row">

                  <div class="col-md-8">
                    @Component('components.form-inputs.model-select',['title' => 'Customer','name'=>'user_id','icon'=>'fas fa-users','options'=>$customers,'required'=>false])@endcomponent
                  </div>
                  <div class="col-md-4">
                    <span class="total-cost"><strong>Total:</strong> KES @if(session('salePrice')){{number_format(session('salePrice'),2)}}@else 0 @endif</span>
                  </div>

                </div>


            </form>

              <!--end supplied products-->
            </div>
          </div>


        </div>

        <div class="row mt-2">
          <div class="col-md-12">
            <a href="#" class="btn btn-info br0 pull-right" onclick="confirm_modal('newSaleConfirmModal')">
              Continue
            </a>
          </div>
        </div>


        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new sale','question'=>'Are you sure you want to save sale?','modalID'=>'newSaleConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-sale-form'])@endcomponent

@endsection
