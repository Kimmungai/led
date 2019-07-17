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
        @Component('components.structure.page-title',['title'=>'Record a new purchase'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'purchases'=>route('purchases.index'),'newPurchase'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-9">
            <div class="purchase-main">
              <!--search form-->
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search product...'])@endcomponent
              <!--end search form-->
              @Component('components.form-inputs.link',['title'=>'New product','href'=>route('trash.empty'),'toolTip'=>'Create new product','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("createProductModal")'])@endcomponent

              <!--couresel-->
              <div class="row">
                <div class="col-md-12 mt-1">
                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="" id="myCarousel">
                  <div class="carousel-inner">
                    <?php $count = 0; ?>
                    @foreach ($products as $product )
                      @Component('components.products.carousel',['product' => $product, 'active'=>$count,'click'=>'add_prod('.$product->id.',"purchased-prods")'])'])@endcomponent
                      <?php $count++; ?>
                    @endforeach

                  </div>
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
                </div>
              </div>
              <!--end couresel-->


              <!--supplied-products-->
              <div class="panel panel-warning" >
  							<div class="panel-heading">
  								<h2>Suplied products</h2>
  							</div>
  							<div class="panel-body no-padding">
  								<table class="table text-center">
  									<thead >
  										<tr >
                        <th class="text-center">Image</th>
  											<th class="text-center">Products</th>
  											<th class="text-center">Serial</th>
  											<th class="text-center">Quantity supplied</th>
  										</tr>
  									</thead>
  									<tbody id="purchased-prods">
                    <?php $purchaseLists = []; ?>
                    <?php if( session('purchaseList') != null) {$purchaseLists = session('purchaseList');}?>

                    @foreach ( $purchaseLists as $purchaseList)
                      <tr data-id="{{$purchaseList['id']}}" id="purchased-product-{{$purchaseList['id']}}">
                        <td> <img id="img-prod-{{$purchaseList['id']}}" class="img-responsive img-circle" src="{{url($purchaseList['image'])}}" height="50" width="50"> </td>
                        <td data-name="{{$purchaseList['name']}}" id="name-prod-{{$purchaseList['id']}}" >{{$purchaseList['name']}}</td>
                        <td data-sku="{{$purchaseList['sku']}}" id="sku-prod-{{$purchaseList['id']}}">{{$purchaseList['sku']}}</td>
                        <td><input id="qty-prod-{{$purchaseList['id']}}" type="number" value="{{$purchaseList['qty']}}" onchange="save_product_list('purchased-prods')"/></td>
                      </tr>
                   @endforeach

  									</tbody>

  								</table>

  							</div>
  						</div>
              <form id="new-purchase-form" class="" action="{{route('purchases.store')}}" method="post" onsubmit="confirm_modal('newPurchaseConfirmModal')">
                @csrf
                <input type="hidden" name="" id="owed-supplier" class=" form-control" value="@if(session('purchaseCost')){{session('purchaseCost')}}@else 0 @endif" disabled/>
                <input type="hidden" name="user_id" value="{{$supplier->id}}">
              @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent
            </form>

              <!--end supplied products-->
            </div>
          </div>

          <div class="col-md-3">
            <div class="purchase-right">
              <h3 class="text-center">Supplier details</h3>
              <!--search form-->
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search supplier...'])@endcomponent
              <!--end search form-->

              @Component('components.user.card-2',['user'=>$supplier])@endcomponent

              <a href="#" class="">create new supplier</a>


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

@endsection
