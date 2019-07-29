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
        @Component('components.structure.page-title',['title'=>'All suppliers'])@endcomponent
        <div class="row">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'New','href'=>route('suppliers.create'),'toolTip'=>'create new supplier','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'suppliers'=>''])
        @endcomponent

        <!--custom page design starts-->

          <div class="row">
            @foreach($suppliers as $supplier)
            <div class="col-md-3 mt-2">
              @Component('components.user.card',['user'=>$supplier,'link' => route('suppliers.show',$supplier->id)])@endcomponent
            </div>
            @endforeach
          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
