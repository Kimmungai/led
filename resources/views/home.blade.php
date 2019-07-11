@extends('layouts.app')

@section('content')
 <body class="sticky-header left-side-collapsed" >
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

			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'Welcome to Ledamcha MIS'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>'noLink'])
        @endcomponent


				<div class="graphs">
					<div class="col_3">

            @foreach( $tabs as $tab )
              @Component('components.dashboard.tabs',['tab' => $tab])
              @endcomponent
            @endforeach


						<div class="clearfix"> </div>
					</div>

        <!--Add buttons-->
        <div class="container">
          <div class="row">

            @Component('components.dashboard.button',[ 'name' => 'New Sale', 'icon' => 'fa fa-cash-register', 'link' => route('sales.create') ])
            @endcomponent

            @Component('components.dashboard.button',[ 'name' => 'New Purchase', 'icon' => 'fa fa-calculator', 'link' => route('purchases.create') ])
            @endcomponent


          </div>
        </div>
        <!--end add buttons-->



			<!-- switches -->
		<div class="switches">

			<div class="col-4">

      @for( $x = 0; $x < 3; $x++ )
        @Component('components.dashboard.reports')
        @endcomponent
      @endfor



				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //switches -->

				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
@endsection
