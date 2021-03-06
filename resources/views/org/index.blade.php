@extends('layouts.app')

@section('content')
 <body class="sticky-header left-side-collapsed">
    <section>

    <!-- left side start-->
    @Component('components.structure.side-menu')@endcomponent
    <!-- left side end-->

		<!-- main content start-->
		<div class="main-content">

			<!-- header-starts -->
      @Component('components.structure.header-menu')@endcomponent
		 <!-- //header-ends -->

     <!--body wrapper start-->
			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'All organisations'])@endcomponent
        <div class="row">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'New','href'=>route('org.create'),'toolTip'=>'create new organisation','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'organisations'=>''])@endcomponent

        <!--custom page design starts-->
          

          <div class="row">
          @foreach($orgs as $org)
            @Component('components.dashboard.cta-icon',['org'=>$org,'icon'=>'fa fa-building','color'=>'#333'])@endcomponent
          @endforeach
          </div>

          <div class="row">
            <div class="col-md-12">
              {{$orgs->links()}}
            </div>
          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
