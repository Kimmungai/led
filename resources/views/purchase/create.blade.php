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
                      @Component('components.products.carousel',['product' => $product, 'active'=>$count])'])@endcomponent
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
  											<th class="text-center">#</th>
                        <th class="text-center">Image</th>
  											<th class="text-center">Products</th>
  											<th class="text-center">Serial</th>
  											<th class="text-center">Quantity supplied</th>
  										</tr>
  									</thead>
  									<tbody>
  										<tr>
  											<td>1</td>
                        <td> <img class="img-responsive img-circle" src="https://scontent-lga3-1.cdninstagram.com/vp/d463fae660dfebcee14ad405ec34ef11/5D38F164/t51.2885-15/sh0.08/e35/s750x750/53740642_423012385121406_298701359536165197_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&ig_cache_key=MjAwMTk1NDAxMDI2NTI4MTA5MQ%3D%3D.2" height="50" width="50"> </td>
  											<td>Mark</td>
  											<td>Otto</td>
  											<td>@Component('components.form-inputs.quantity',['minusID'=>'minus-prod-1','plusID'=>'plus-prod-1','field'=>'prod-1'])@endcomponent</td>
  										</tr>
  										<tr>
  											<td>2</td>
                        <td> <img class="img-responsive img-circle" src="https://scontent-lga3-1.cdninstagram.com/vp/d463fae660dfebcee14ad405ec34ef11/5D38F164/t51.2885-15/sh0.08/e35/s750x750/53740642_423012385121406_298701359536165197_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&ig_cache_key=MjAwMTk1NDAxMDI2NTI4MTA5MQ%3D%3D.2" height="50" width="50"> </td>

  											<td>Jacob</td>
  											<td>Thornton</td>
  											<td>@Component('components.form-inputs.quantity',['minusID'=>'minus-prod-1','plusID'=>'plus-prod-1','field'=>'prod-2'])@endcomponent</td>
  										</tr>
  										<tr>
  											<td>3</td>
                        <td> <img class="img-responsive img-circle" src="https://scontent-lga3-1.cdninstagram.com/vp/d463fae660dfebcee14ad405ec34ef11/5D38F164/t51.2885-15/sh0.08/e35/s750x750/53740642_423012385121406_298701359536165197_n.jpg?_nc_ht=scontent-lga3-1.cdninstagram.com&ig_cache_key=MjAwMTk1NDAxMDI2NTI4MTA5MQ%3D%3D.2" height="50" width="50"> </td>
  											<td>Larry</td>
  											<td>the Bird</td>
  											<td>@Component('components.form-inputs.quantity',['minusID'=>'minus-prod-1','plusID'=>'plus-prod-1','field'=>'prod-3'])@endcomponent</td>
  										</tr>
  									</tbody>
  								</table>
  							</div>
  						</div>
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

@if(count($errors))
  <script>
  $(document).ready(function(){
    confirm_modal("createProductModal");
  });
  </script>
@endif

@endsection
