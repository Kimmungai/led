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
        @Component('components.structure.page-title',['title'=>'Trashed items'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'trash'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">
        @for($x=0;$x < 9;$x++)
          @Component('components.dashboard.cta-icon',['title'=>'customers','icon'=>'fa fa-users','link'=>route('customers.index'),'color'=>'#333'])@endcomponent
        @endfor
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
