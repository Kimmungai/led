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
        @Component('components.structure.page-title',['title'=>'Create subscription'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('subscription.index'),'specifiedText'=>'All subscriptions','specified'=>'New subscription'])
        @endcomponent

        <!--custom page design starts-->

        <div class="row">
          <form id="new-user-form" action="{{route('subscription.store')}}" method="post" onsubmit="confirm_modal('newUserConfirmModal')">
            @csrf

          <div class="col-md-8">
            <?php $subscriptionPeriods=[
              'week' => ['name'=>'Weekly','value'=>'week'],
              'month' => ['name'=>'Monthly','value'=>'month'],
              'year' => ['name'=>'Yearly','value'=>'year'],
            ]; ?>
            @Component('components.form-inputs.input',['title' => 'Title','name'=>'type','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter package title','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Price','name'=>'price','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter package price','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Currency','name'=>'currency','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter currency','required'=>false,'value'=>'KES'])@endcomponent
            @Component('components.form-inputs.select',['title' => 'Duartion','name'=>'period','icon'=>'fas fa-calendar','options'=>$subscriptionPeriods,'required'=>false,'selected'=>'month'])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Button text','name'=>'cta','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter button text','required'=>false,'value'=>'order'])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Images','name'=>'images','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload images','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Videos','name'=>'videos','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload videos','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Panos','name'=>'panos','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload pano images','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Listings','name'=>'listings','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload listings','required'=>true])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent
          </div>

          <div class="col-md-4">
            <h4>Features <span class="text-danger">*</span> </h4>
            @Component('components.form-inputs.side-textarea',['title' => '','name'=>'features','icon'=>'fas fa-calendar','placeholder' => 'One feature per line','required'=>true,'cols'=>10,'rows'=>5])@endcomponent


            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Create agent'])@endcomponent

          </div>
        </form>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new user','question'=>'Are you sure you want to save subscription?','modalID'=>'newUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-user-form'])@endcomponent

@endsection
