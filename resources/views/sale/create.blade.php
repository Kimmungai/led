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

            <div class="col-md-12">
              <div class="products-selection-section">
                <!--search form-->
                @Component('components.forms.search-1',['action'=>'','method'=>'','placeholder'=>'Enter product code...'])@endcomponent
                <!--end search form-->
                <!--@Component('components.pos.tabs',['type' => $type])@endcomponent-->

                  <!--<div class="row">
                    @foreach($products as $product )
                      @Component('components.products.single',['product' => $product,'addClik' => 'add_prod_to_register(this.id,"register-preview")'])@endcomponent
                    @endforeach
                  </div>-->
                  <?php $soldProds = []; ?>
                  <?php if( session('soldProds') != null) {$soldProds = session('soldProds');}?>

                  @Component('components.pos.cart-preview',['tableID' => 'register-preview','soldProds' => $soldProds])@endcomponent

              <div class="form-group code-search">
                <div class="input-group input-icon right in-grp1">
                  <span class="input-group-addon">
                    <i class="fa fa-users"></i>
                  </span>
                    <select class="form-control" name="">
                      <option value="">Nyau</option>
                      <option value="">Nyau</option>
                      <option value="">Nyau</option>
                    </select>
                </div>
                <div class="clearfix"> </div>
              </div>

                </div>

                </div>




                <a href="#" class="btn btn-info br0 pull-right">
                  Continue
                </a>

              </div>


        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new sale','question'=>'Are you sure you want to record sale?','modalID'=>'newSaleConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-sale-form'])@endcomponent

@endsection
