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
        @Component('components.structure.page-title',['title'=>'Record a new supply'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'New product','href'=>route('trash.empty'),'toolTip'=>'Create new product','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("createProductModal")'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'New supply'])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="purchase-main">

              <!--search form-->
              @Component('components.forms.search-1',['action'=>'','method'=>'','placeholder'=>'Search product...'])@endcomponent
              <!--end search form-->


  							<div class="panel-body no-padding mt-3">
  								<table class="table text-center">
  									<thead >
  										<tr >
  											<th class="text-center">Product name</th>
  											<th class="text-center">Supply price</th>
  											<th class="text-center">Supplied (Kg)</th>
  										</tr>
  									</thead>
  									<tbody id="purchased-prods">
                    <?php $purchaseLists = []; ?>
                    <?php if( session('purchaseList') != null) {$purchaseLists = session('purchaseList');}?>

                    @foreach ( $purchaseLists as $purchaseList)
                      <tr data-id="{{$purchaseList['id']}}" id="purchased-product-{{$purchaseList['id']}}">
                        <td data-name="{{$purchaseList['name']}}" id="name-prod-{{$purchaseList['id']}}" >{{$purchaseList['name']}}</td>
                        <td data-sku="{{$purchaseList['sku']}}" id="sku-prod-{{$purchaseList['id']}}">{{$purchaseList['sku']}}</td>
                        <td><input id="qty-prod-{{$purchaseList['id']}}" type="number" value="{{$purchaseList['qty']}}" onchange="save_product_list('purchased-prods')"/></td>
                      </tr>
                   @endforeach

  									</tbody>

  								</table>

  							</div>
              <form id="new-purchase-form" class="" action="{{route('purchases.store')}}" method="post" onsubmit="confirm_modal('newPurchaseConfirmModal')">
                @csrf
                <input type="hidden" name="" id="owed-supplier" class=" form-control" value="@if(session('purchaseCost')){{session('purchaseCost')}}@else 0 @endif" />
                <input type="hidden" name="user_id" value="@if(isset($supplier)){{$supplier->id}}@endif">

                <?php $userTypes=[
                  'staff' => ['name'=>'Staff','value'=>env('STAFF',1)],
                  'admin' => ['name'=>'Admin','value'=>env('ADMIN',3)],
                ]; ?>

                @Component('components.form-inputs.select',['title' => 'Supplier','name'=>'type','icon'=>'fas fa-user-tag','options'=>$userTypes,'required'=>false])@endcomponent

            </form>

              <!--end supplied products-->
            </div>
          </div>



        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>

    <!--modals-->
    @Component('components.modals.create-prod',['title'=>'New product','mainFields'=>$prodRegMainFields,'sideFields'=>$prodRegSideFields,'modalID'=>'createProductModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Create & add','url'=>route('trash.empty')])@endcomponent
    @Component('components.modals.confirm',['title'=>'Save new product','question'=>'Are you sure you want to save product?','modalID'=>'newProdConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-prod-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Save new purchase','question'=>'Are you sure you want to save purchase?','modalID'=>'newPurchaseConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-purchase-form'])@endcomponent

@if(count($errors))
  <script>
  $(document).ready(function(){
    confirm_modal("createProductModal");
  });
  </script>
@endif

@if( session('newProduct') )
  <script>
  $(document).ready(function(){
  add_prod({{session('newProduct')['id']}},"purchased-prods");
  });
  </script>
@endif

@endsection
