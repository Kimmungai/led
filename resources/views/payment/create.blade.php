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

        <h3 class="text-uppercase text-center">Receive payment</h3>

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>route('sales.index'),'newSale'=>route('sales.show',1),'newSalePayment'=>''])
        @endcomponent

        <!--custom page design starts-->
        @Component('components.payment.create-top')@endcomponent
        <div class="row">
          <div class="col-md-4">
            <div class="calculator">
              <fieldset id="container">
		<form class="keys" name="calculator" onsubmit="calculator_calculate()">
			<input id="display" type="text" name="display" placeholder="0" autofocus>

			<input class="button digits" type="button" value="7" onclick="calculator.display.value += '7'">
			<input class="button digits" type="button" value="8" onclick="calculator.display.value += '8'">
			<input class="button digits" type="button" value="9" onclick="calculator.display.value += '9'">
			<input class="button mathButtons" type="button" value="+" onclick="calculator.display.value += ' + '">
			<br>
			<input class="button digits" type="button" value="4" onclick="calculator.display.value += '4'">
			<input class="button digits" type="button" value="5" onclick="calculator.display.value += '5'">
			<input class="button digits" type="button" value="6" onclick="calculator.display.value += '6'">
			<input class="button mathButtons" type="button" value="-" onclick="calculator.display.value += ' - '">
			<br>
			<input class="button digits" type="button" value="1" onclick="calculator.display.value += '1'">
			<input class="button digits" type="button" value="2" onclick="calculator.display.value += '2'">
			<input class="button digits" type="button" value="3" onclick="calculator.display.value += '3'">
			<input class="button mathButtons" type="button" value="x" onclick="calculator.display.value += ' * '">
			<br>
			<input id="clearButton" class="button" type="button" value="C" onclick="calculator.display.value = ''">
			<input class="button digits" type="button" value="0" onclick="calculator.display.value += '0'">
			<input id="equalsButton" class="button mathButtons" type="button" value="=" onclick="calculator.display.value = eval(calculator.display.value)" >
			<input class="button mathButtons" type="button" value="/" onclick="calculator.display.value += ' / '">
      <br>
		</form>

    <input id="PayButton" class="button" type="button" value="Pay">


	</fieldset>
            </div>
          </div>
          <div class="col-md-8">
            <div class="cart-summary">
              <div class="table table-responsive mt-1">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Item</th>
                      <th>Quantity (Units)</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> <span class="fa fa-times-circle"></span> <img  src="/placeholders/s1.png" height="50" width="50" alt="" > </td>
                      <td >Full chicken</td>
                      <td> <input class="form-control" type="number" name="" value="100"> </td>
                      <td >Ksh. 20,000</td>
                    </tr>

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
@endsection
