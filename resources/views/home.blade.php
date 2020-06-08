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
        @Component('components.structure.page-title',['title'=>'Welcome to '.env('APP_NAME_HTML','Rent and Beyond').' Admin'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>'/'])
        @endcomponent


				<!--<div class="row">
            @Component('components.dashboard.button',[ 'name' => 'Sell', 'icon' => 'fa fa-cash-register', 'link' => route('sales.create') ])
            @endcomponent

            @Component('components.dashboard.button',[ 'name' => 'Receive', 'icon' => 'fa fa-calculator', 'link' => route('purchases.create') ])
            @endcomponent
        </div>-->

            <div class="graphs mb-1 mt-1">
    					<div class="col_3">

            @foreach( $tabs as $tab )
              @Component('components.dashboard.tabs',['tab' => $tab])
              @endcomponent
            @endforeach







						<div class="clearfix"> </div>
					</div>

          <div class="row mt-4">
            <div class="col-md-6">
              <div class="platform-analytics">
                <h3>Current statics</h3>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <span class="badge">100%</span>
                      Cras justo odio
                    </li>
                    <li class="list-group-item">
                      <span class="badge">100%</span>
                      Cras justo odio
                    </li>
                    <li class="list-group-item">
                      <span class="badge">10%</span>
                      Cras justo odio
                    </li>
                    <li class="list-group-item">
                      <span class="badge">12%</span>
                      Cras justo odio
                    </li>
                  </ul>
                </div>
            </div>
            <div class="col-md-6">
              <div class="platform-analytics">
                <h3>Current statics</h3>
                <span>Sales</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    20%
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>

                <span>Monthly new users</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    60%
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>

                <span>Nogo users</span>
                <div class="progress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    60%
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>

              </div>
            </div>
          </div>





			<!-- switches -->
		<!--<div class="switches">

			<div class="col-4">

      @for( $x = 0; $x < 3; $x++ )
        @Component('components.dashboard.reports')
        @endcomponent
      @endfor



				<div class="clearfix"></div>
			</div>
		</div>-->
		<!-- //switches -->

				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
@endsection
