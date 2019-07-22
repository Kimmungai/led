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
        @Component('components.structure.page-title',['title'=>'All purchases'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'purchases'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Supplier</th>
              <th>Owed</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach( $purchases as $purchase )
              <tr>
                <th><a href="#" style="color:inherit"></a> {{$count}}</th>
                <td>@if($purchase->user){{$purchase->user->name}}@endif</td>
                <td>Ksh. {{number_format($purchase->amountOwed,2)}}</td>
                <td>{{ \Carbon\Carbon::parse($purchase->created_at)->diffForHumans() }}</td>
                @if( $purchase->amountOwed <= $purchase->amountPaid)
                <td><span class="fa fa-circle text-green"></span> Paid</td>
                @else
                <td><span class="fa fa-circle text-danger"></span> Unpaid</td>
                @endif
                <td><a href="#" class="btn btn-xs btn-default"><span class="fa fa-eye"></span> Open</a></td>
              </tr>
              <?php $count++; ?>
              @endforeach
            </tbody>
          </table>
        </div>
        <!--custom page design ends-->

        <div class="row">
          <div class="col-md-12">
            {{$purchases->links()}}
          </div>
        </div>

			</div>
			 <!--body wrapper end-->
		</div>
@endsection
