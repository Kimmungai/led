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
        @Component('components.structure.page-title',['title'=>'Quotations'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'detailedReport'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">
        @foreach($quotes as $quote)
          @Component('components.dashboard.cta-icon',['title'=>'Quote-'.$quote->id,'icon'=>'fa fa-file-invoice','link'=>route('quotation.show',$quote->id),'color'=>'#2196F3'])@endcomponent
        @endforeach
        </div>
        <!--custom page design ends-->

        <div class="row">
          <div class="col-md-12">
            {{$quotes->links()}}
          </div>
        </div>

			</div>
			 <!--body wrapper end-->
		</div>
@endsection
