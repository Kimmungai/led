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
        @Component('components.structure.page-title',['title'=>'Receive payment'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>route('sales.index'),'newSalePayment'=>''])
        @endcomponent

        <!--custom page design starts-->
        @Component('components.payment.create-top')@endcomponent
        <div class="row">
          <div class="col-md-4">
            <h4 id="calculator-info" class="text-success">Due: <strong>Ksh. {{number_format(session('salePrice'),2)}}</strong></h4>

            <input type="hidden" name="" id="totalAmountDue" class=" form-control" value="@if(session('salePrice')){{session('salePrice')}}@else 0 @endif" />

            <div class="calculator">
              <fieldset id="container">
		<form class="keys" name="calculator" onsubmit="calculate_balance({{session('salePrice')}})">
			<input id="display" type="text" name="display" placeholder="0.00" autofocus>

			<input class="button digits" type="button" value="7" onclick="calculator.display.value += '7'">
			<input class="button digits" type="button" value="8" onclick="calculator.display.value += '8'">
			<input class="button digits" type="button" value="9" onclick="calculator.display.value += '9'">
			<input class="button mathButtons" type="button" value="£" onclick="calculate_balance({{session('salePrice')}})">
			<br>
			<input class="button digits" type="button" value="4" onclick="calculator.display.value += '4'">
			<input class="button digits" type="button" value="5" onclick="calculator.display.value += '5'">
			<input class="button digits" type="button" value="6" onclick="calculator.display.value += '6'">
			<input class="button mathButtons" type="button" value="%" onclick="calculate_balance({{session('salePrice')}})">
			<br>
			<input class="button digits" type="button" value="1" onclick="calculator.display.value += '1'">
			<input class="button digits" type="button" value="2" onclick="calculator.display.value += '2'">
			<input class="button digits" type="button" value="3" onclick="calculator.display.value += '3'">
			<input class="button mathButtons" type="button" value="$" onclick="calculate_balance({{session('salePrice')}})">
			<br>
			<input id="clearButton" class="button" type="button" value="C" onclick="calculator.display.value = ''">
			<input class="button digits" type="button" value="0" onclick="calculator.display.value += '0'">
			<input id="equalsButton" class="button mathButtons" type="button" value="=" onclick="calculate_balance()" >
			<input class="button mathButtons" type="button" value="¥" onclick="calculate_balance({{session('salePrice')}})">
      <br>
		</form>

    <input id="PayButton" class="button" type="button" value="Receive money" onclick="calculate_balance({{session('salePrice')}})">


	</fieldset>
            </div>
          </div>
          <div class="col-md-8">
            <div class="cart-summary">
              <div class="table table-responsive mt-1">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Quantity (Units)</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $soldProds = []; ?>
                    <?php if( session('soldProds') != null) {$soldProds = session('soldProds');$tableID="payment-table";}?>

                    @foreach( $soldProds as $soldProd )
                      <tr data-cost="{{$soldProd['price']}}" data-id="{{$soldProd['id']}}" id="sold-product-{{$soldProd['id']}}" >
                        <td data-name="{{$soldProd['name']}}" id="name-prod-{{$soldProd['id']}}"> {{$soldProd['name']}}</td>
                        <td> <input id="qty-prod-{{$soldProd['id']}}" class="form-control" type="number" name="" value="{{$soldProd['qty']}}" onchange="save_cart_list('{{$tableID}}')"> </td>
                        <td data-price="{{$soldProd['price']}}" id="price-prod-{{$soldProd['id']}}">Ksh. {{number_format($soldProd['price'],2)}}</td>
                      </tr>
                    @endforeach
                    <!--<tr>
                      <td> <span class="fa fa-times-circle"></span> <img  src="/placeholders/s1.png" height="50" width="50" alt="" > </td>
                      <td >Full chicken</td>
                      <td> <input class="form-control" type="number" name="" value="100"> </td>
                      <td >Ksh. 20,000</td>
                    </tr>-->

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save payment','question'=>'Are you sure you want to save payment?','modalID'=>'newPaymentConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-payment-form'])@endcomponent

@endsection
