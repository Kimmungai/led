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
        @Component('components.structure.page-title',['title'=>'Quick report'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'quickReport'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">
          <div class="switches">

      			<div class="col-4">

            @for( $x = 0; $x < 3; $x++ )
              @Component('components.dashboard.reports')
              @endcomponent
            @endfor



      				<div class="clearfix"></div>
      			</div>
      		</div>
        </div>
        <div class="row">

          <div class="col-md-6">

            @Component('components.reports.bar-chart')@endcomponent

          </div>

          <div class="col-md-4">

            @Component('components.reports.pie-chart')@endcomponent

          </div>
        </div>

        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
