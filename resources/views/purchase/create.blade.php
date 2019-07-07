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
              <div class="cart-preview-section">
                <div class="table table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Quantity (Units)</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="fa fa-times-circle"></span> Full chicken</td>
                        <td> <input class="form-control" type="number" name="" value="100"> </td>
                        <td>Ksh. 20,000</td>
                      </tr>
                      <tr>
                        <td><span class="fa fa-times-circle"></span> Fish fillet</td>
                        <td> <input class="form-control" type="number" name="" value="100"> </td>
                        <td>Ksh. 20,000</td>
                      </tr>
                      <tr>
                        <td><span class="fa fa-times-circle"></span> Drumsticks</td>
                        <td> <input class="form-control" type="number" name="" value="100"> </td>
                        <td>Ksh. 100,000</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2">Sub total</td>
                        <td>Ksh. 500,000</td>
                      </tr>
                      <tr>
                        <td colspan="2">Discount (2%)</td>
                        <td>Ksh. 5000</td>
                      </tr>
                      <tr>
                        <td colspan="2">VAT (16%)</td>
                        <td>Ksh. 15,000</td>
                      </tr>
                      <tr>
                        <td colspan="2">Total</td>
                        <td>Ksh. 710,000</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <a href="#" class="btn btn-info br0">
                 <span class="fa fa-users"></span> Select customer
               </a>

               <a href="{{route('payments.create')}}" class="btn btn-success mt-2 pay-btn">
                Payment
              </a>

              </div>
            </div>

          </div>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
