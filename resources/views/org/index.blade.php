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
        @Component('components.structure.page-title',['title'=>'All organisations'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'organisations'=>''])
        @endcomponent

        <!--custom page design starts-->
          <div class="row">
            <!--search form-->
            <div class="col-md-12">
              @Component('components.forms.search',['action'=>'','method'=>'','placeholder'=>'Search organisation...'])@endcomponent
            </div>
            <!--end search form-->
          </div>

          <div class="row">
          @for($x=0;$x < 1;$x++)
            @Component('components.dashboard.cta-icon',['title'=>'Ledamcha Ngara','icon'=>'fa fa-building','link'=>route('org.index'),'color'=>'#333'])@endcomponent
          @endfor
          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
