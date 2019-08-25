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
        @Component('components.structure.page-title',['title'=>'Business cards'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Business cards'])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="products-selection-section">








            </div>


        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
