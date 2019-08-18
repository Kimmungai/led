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
        @Component('components.structure.page-title',['title'=>'Receiving'])@endcomponent

        <div class="row">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'New product','href'=>route('trash.empty'),'toolTip'=>'Create new product','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("createProductModal")'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'New supply'])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="purchase-main">

              <!--search form-->
              @Component('components.forms.search-1',['action'=>'','method'=>'','placeholder'=>'Product code...','keyup' => 'search_product(this.value,\'purchased-prods\')'])@endcomponent
              @Component('components.search.results-panel',['action'=>'','method'=>'','placeholder'=>'Product code...'])@endcomponent
              <!--end search form-->


  							<div class="panel-body table-responsive no-padding mt-3">
  								<table class="">
  									<thead>
  										<tr >
  											<th >Product name </th>
  											<th >Supply price</th>
  											<th >Supplied (Kg)</th>
  										</tr>
  									</thead>
  									<tbody id="purchased-prods">
                    <?php $purchaseLists = []; ?>
                    <?php if( session('purchaseList') != null) {$purchaseLists = session('purchaseList');}?>

                    @foreach ( $purchaseLists as $purchaseList)
                      <tr data-id="{{$purchaseList['id']}}" id="purchased-product-{{$purchaseList['id']}}">
                        <td data-label="Name" data-name="{{$purchaseList['name']}}" id="name-prod-{{$purchaseList['id']}}" ><span class="fas fa-times-circle pointer" onclick="remove_row('purchased-product-{{$purchaseList['id']}}','purchased-prods')"></span> {{$purchaseList['name']}}</td>
                        <td  data-label="Supply price"><input class="form-control1" id="cost-prod-{{$purchaseList['id']}}" type="number" value="{{$purchaseList['cost']}}" onchange="save_product_list('purchased-prods')"/></td>
                        <td data-label="Supplied (Kg)"><input class="form-control1" id="qty-prod-{{$purchaseList['id']}}" type="number" value="{{$purchaseList['qty']}}" onchange="save_product_list('purchased-prods')"/></td>
                      </tr>
                   @endforeach

  									</tbody>

  								</table>

  							</div>
              <form id="new-purchase-form" class="" action="{{route('purchases.store')}}" method="post" onsubmit="confirm_modal('newPurchaseConfirmModal')">
                @csrf
                <input type="hidden" name="" id="total-cost" class=" form-control" value="@if(session('purchaseCost')){{session('purchaseCost')}}@else 0 @endif" />
                <!--<input type="hidden" name="user_id" value="@if(isset($supplier)){{$supplier->id}}@endif">-->

                <div class="row mt-2">

                  <div class="col-md-8">
                    @Component('components.form-inputs.model-select',['title' => 'Supplier','name'=>'user_id','icon'=>'fas fa-user-check','options'=>$suppliers,'required'=>false])@endcomponent
                  </div>
                  <div class="col-md-4">
                    <span class="total-cost" style="line-height:35px"><strong>Total:</strong> KES @if(session('purchaseCost')){{number_format(session('purchaseCost'),2)}}@else 0 @endif</span>
                  </div>

                </div>


            </form>

              <!--end supplied products-->
            </div>
          </div>


        </div>

        <div class="row mt-2">
          <div class="col-md-12">
            <a href="#" class="btn btn-info br0 pull-right" onclick="confirm_modal('newPurchaseConfirmModal')">
              Save
            </a>
          </div>
        </div>

        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>

    <!--modals-->
    @Component('components.modals.create-prod',['title'=>'New product','mainFields'=>$prodRegMainFields,'sideFields'=>$prodRegSideFields,'modalID'=>'createProductModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Create & add','url'=>route('trash.empty')])@endcomponent
    @Component('components.modals.confirm',['title'=>'Save new product','question'=>'Are you sure you want to save product?','modalID'=>'newProdConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-prod-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Receiving','question'=>'Are you sure you want to save data?','modalID'=>'newPurchaseConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-purchase-form'])@endcomponent

@if(count($errors))
  <script>
  $(document).ready(function(){
    confirm_modal("createProductModal");
  });
  </script>
@endif

@if( session('newProduct') )
<?php $suppliedQTY = 1; ?>
<?php if(session('newProduct')['inventory']) {$suppliedQTY = session('newProductQty');} ?>
  <script>
  $(document).ready(function(){
  update_a_table({{session('newProduct')['id']}},"purchased-prods",{{$suppliedQTY}});
  });
  </script>
@endif

@endsection
