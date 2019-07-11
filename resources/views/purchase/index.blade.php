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
              <tr>
                <th><a href="#" style="color:inherit"><span class="fa fa-times-circle"></span></a> 1</th>
                <td>Peter kimani</td>
                <td>Ksh. 3,000</td>
                <td>3 minutes ago</td>
                @if(0)
                <td><span class="fa fa-circle text-green"></span> Paid</td>
                @else
                <td><span class="fa fa-circle text-danger"></span> Unpaid</td>
                @endif
                <td><a href="#" class="btn btn-xs btn-default"><span class="fa fa-eye"></span> Open</a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
