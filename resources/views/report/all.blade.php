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
        @Component('components.structure.page-title',['title'=>'Detailed report'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'detailedReport'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">
        @for($x=0;$x < 3;$x++)
          @Component('components.dashboard.cta-icon',['title'=>'quotations','icon'=>'fa fa-file-invoice','link'=>route('invoices.index'),'color'=>'red'])@endcomponent
        @endfor
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
