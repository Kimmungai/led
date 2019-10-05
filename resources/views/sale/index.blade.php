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
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'New','href'=>route('sales.create'),'toolTip'=>'create new sale','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>''])
        @endcomponent



        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table-bordered">
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
                <td data-label="Serial"><a href="#" style="color:inherit"></a><span class="fas fa-times-circle pointer" onclick="remove_row_and_submit('sale-{{$sale->id}}','sale-{{$sale->id}}-remove-form')"></span> {{$count}}</td>
                <td data-label="Customer">@if( $sale->user ){{$sale->user->name}} @endif</td>
                <td data-label="Value">Ksh. {{number_format($sale->amountDue,2)}}</td>
                <td data-label="Date">{{ \Carbon\Carbon::parse($sale->created_at)->diffForHumans() }}</td>
                @if( $sale->status)
                <td data-label="Status"><span class="fa fa-circle text-green"></span> Paid</td>
                @else
                <td data-label="Status">@if( $sale->report )<a href=" {{route('invoices.show',$sale->report->id)}} " title="Open invoice"><span class="fa fa-circle text-danger"></span> Unpaid</a>@else <span class="fa fa-circle text-danger"></span> Unpaid @endif</td>
                @endif
              </tr>
              <?php $count++; ?>
              <form class="d-none hidden" id="sale-{{$sale->id}}-remove-form" action="{{route('sales.destroy',$sale->id)}}" method="post">
                @csrf
                @method('DELETE')
              </form>
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
