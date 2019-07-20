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

        @Component('components.form-inputs.link',['title'=>'New','href'=>route('sales.create'),'toolTip'=>'create new sale','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <th>Serial</th>
              <th>Customer</th>
              <th>Value</th>
              <th>Date</th>
              <th>Status</th>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach( $sales as $sale )
              <tr>
                <th><a href="#" style="color:inherit"></a> {{$count}}</th>
                <td>{{$sale->user->name}}</td>
                <td>Ksh. {{number_format($sale->amountDue,2)}}</td>
                <td>{{ \Carbon\Carbon::parse($sale->created_at)->diffForHumans() }}</td>
                @if( $sale->amountDue <= $sale->amountReceived)
                <td><span class="fa fa-circle text-green"></span> Paid</td>
                @else
                <td><span class="fa fa-circle text-danger"></span> Unpaid</td>
                @endif
              </tr>
              <?php $count++; ?>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="row">
          <div class="col-md-12">
            {{$sales->links()}}
          </div>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
