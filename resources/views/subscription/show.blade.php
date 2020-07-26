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
        @Component('components.structure.page-title',['title'=>'Edit subscription'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New subscription','href'=>route('subscription.create'),'toolTip'=>'Create a new subscription','icon'=>'fas fa-user','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('subscription.index'),'specifiedText'=>'All subscriptions','specified'=>$subscription->type])
        @endcomponent

        <div class="row">
          <form id="edit-user-form" action="{{route('subscription.update',$subscription->id)}}" method="post" onsubmit="confirm_modal('subscriptionEditConfirmModal')">
            @csrf
            @method('PUT')
            <div class="col-md-8">
              <?php $subscriptionPeriods=[
                'week' => ['name'=>'Weekly','value'=>'week'],
                'month' => ['name'=>'Monthly','value'=>'month'],
                'year' => ['name'=>'Yearly','value'=>'year'],
              ]; ?>
              @Component('components.form-inputs.input',['title' => 'Title','name'=>'type','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter package title','required'=>true,'value'=>$subscription->type])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Price','name'=>'price','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter package price','required'=>true,'value'=>$subscription->price])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Currency','name'=>'currency','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter currency','required'=>false,'value'=>$subscription->currency])@endcomponent
              @Component('components.form-inputs.select',['title' => 'Duartion','name'=>'period','icon'=>'fas fa-calendar','options'=>$subscriptionPeriods,'required'=>false,'selected'=>$subscription->period])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Button text','name'=>'cta','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter button text','required'=>false,'value'=>$subscription->cta])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Images','name'=>'images','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload images','required'=>true,'value'=>$subscription->images])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Videos','name'=>'videos','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload videos','required'=>true,'value'=>$subscription->videos])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Panos','name'=>'panos','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload pano images','required'=>true,'value'=>$subscription->panos])@endcomponent
              @Component('components.form-inputs.input',['title' => 'Listings','name'=>'listings','type'=>'number','icon'=>'fas fa-info-circle','placeholder' => 'Max upload listings','required'=>true,'value'=>$subscription->listings])@endcomponent

              @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent
              @Component('components.form-inputs.button',['value' => 'Delete','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete user','click'=>'confirm_modal("deleteSubscriptionConfirmModal")'])@endcomponent

            </div>

            <div class="col-md-4">
              <h4>Features <span class="text-danger">*</span></h4>
              <?php $features = [] ?>
              @foreach( $subscription->features as $feature )
                <?php  $features []= $feature->title ?>
              @endforeach

              @Component('components.form-inputs.side-textarea',['title' => '','name'=>'features','icon'=>'fas fa-calendar','placeholder' => 'One feature per line','required'=>true,'cols'=>10,'rows'=>5,'value'=>implode("\n",$features)])@endcomponent


              @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Create agent'])@endcomponent

            </div>
        </form>
        <!--hidden forms-->

        <form class="d-none hidden" id="delete-subscription-form" action="{{route('subscription.destroy',$subscription->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Update subscription','question'=>'Are you sure you want to update '.$subscription->type.'\'s details?','modalID'=>'subscriptionEditConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-user-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete subscription','question'=>'Are you sure you want to delete '.$subscription->type.'?','modalID'=>'deleteSubscriptionConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-subscription-form'])@endcomponent

@endsection
