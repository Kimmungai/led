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

			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">

            @for( $x = 0; $x < 6; $x++ )
              @Component('components.dashboard.tabs')
              @endcomponent
            @endfor


						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		<div class="switches">

			<div class="col-4">

      @for( $x = 0; $x < 4; $x++ )
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
