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
        @Component('components.structure.page-title',['title'=>'All sales'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New sale','href'=>route('payment.create'),'toolTip'=>'Create a new sale','icon'=>'fas fa-money-bill','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Sale'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Method</th>
              <th>Due</th>
              <th>Receivable</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach( $payments->data as $payment )
              <tr>
                <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteClient{{$payment->id}}ConfirmModal')" title="Delete  {{$payment->method}} " style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$payment->id}}</td>
                <td>{{$payment->method}}</td>
                <td>KES {{number_format($payment->totalDue,2)}}</td>
                <td>KES {{number_format($payment->totalPayable,2)}}</td>
                @if( $payment->status == 'paid' )
                <td class="text-green">PAID</td>
                @else
                <td class="text-danger">PENDING</td>
                @endif
                <td> <a href="{{route('payment.show',$payment->id)}}" class="btn btn-sm btn-default" title="Open @if(isset($payment->firstName)) {{$payment->firstName}} {{$payment->lastName}} @endif"><span class="fa fa-eye"></span> open</a> </td>
                @Component('components.modals.confirm',['title'=>'Delete payment','question'=>'Are you sure you want to delete record?','modalID'=>'deleteClient'.$payment->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-payment-'.$payment->id.'-form'])@endcomponent
                <form class="d-none hidden" id="delete-payment-{{$payment->id}}-form" action="{{route('payment.destroy',$payment->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                </form>
              </tr>
              <?php $count++; ?>
              @endforeach
            </tbody>
          </table>
        </div>
        <!--custom page design ends-->

        <div class="row">
          <div class="col-md-12">

          </div>
        </div>

			</div>
			 <!--body wrapper end-->
		</div>

@endsection
