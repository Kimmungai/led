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

        <h3 class="text-uppercase text-center">All sales</h3>

        @Component('components.structure.breadcrump',['home'=>route('home'),'sales'=>''])
        @endcomponent

        <!--custom page design starts-->

        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
