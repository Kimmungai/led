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
        @Component('components.payment.create-top',['user_acc_bal'=>$user_acc_bal,'user'=>$user])@endcomponent
        <div class="row">
          <div class="col-md-4">

            <h4 id="calculator-info" class="text-success">Due: <strong>Ksh. {{number_format(session('salePrice'),2)}}</strong></h4>
            <input type="hidden" name="" id="totalAmountDue" class=" form-control" value="@if(session('salePrice')){{session('salePrice')}}@else 0 @endif" />

            @Component('components.pos.calculator',[ 'name' => 'pos-calculator' ])@endcomponent

          </div>
          <div class="col-md-8">
            <div class="cart-summary">
              <div class="table table-responsive mt-1">
                <table class="table">
                  <thead>
                    <tr>
                      <th >Item name</th>
                      <th >Sale price</th>
                      <th >Sold (Kg)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $soldProds = []; ?>
                    <?php if( session('soldProds') != null) {$soldProds = session('soldProds');$tableID="payment-table";}?>

                    @foreach( $soldProds as $soldProd )
                      <tr data-cost="{{$soldProd['cost']}}" data-id="{{$soldProd['id']}}" id="sold-product-{{$soldProd['id']}}" >
                        <td data-name="{{$soldProd['name']}}" id="name-prod-{{$soldProd['id']}}"> {{$soldProd['name']}}</td>
                        <td data-price="{{$soldProd['cost']}}" id="price-prod-{{$soldProd['id']}}">Ksh. {{number_format($soldProd['cost'],2)}}</td>
                        <td>{{$soldProd['qty']}}</td>
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

            <button id="" type="button" class="btn btn-success pay-btn btn-block save-payment-btn" name="button" onclick="confirm_modal('newPaymentConfirmModal')" disabled>Save</button>

          </div>
        </div>
        <!--custom page design ends-->

        <form class="d-none hidden" id="delete-sale-form" action="{{route('sales.destroy',$sale->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save payment','question'=>'Are you sure you want to save payment?','modalID'=>'newPaymentConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-payment-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete sale','question'=>'Are you sure you want to delete sale?','modalID'=>'deleteSale','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-sale-form'])@endcomponent

@endsection
