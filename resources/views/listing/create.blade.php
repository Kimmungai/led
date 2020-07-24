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
        @Component('components.structure.page-title',['title'=>'Create sale'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('payment.index'),'specifiedText'=>'All sales','specified'=>'New sale'])
        @endcomponent

        <!--custom page design starts-->

        <div class="row">
          <form id="new-user-form" action="{{route('listing.store')}}" method="post" onsubmit="confirm_modal('newUserConfirmModal')">
            @csrf

          <div class="col-md-8">

            <?php $Types=[
              '1' => ['name'=>'Commercial','value'=>1],
              '2' => ['name'=>'Residential','value'=>2],
              '3' => ['name'=>'Agricultural','value'=>3],
              '4' => ['name'=>'Industrial','value'=>4],

            ]; ?>
            <?php $Agents = [] ?>
            @foreach( $agents->data as $agent )
              @php $Agents [$agent->id] = ['name'=>$agent->user->firstName,'value'=>$agent->id] @endphp
            @endforeach
            <?php $listingTypes=[
              '1' => ['name'=>'For rent','value'=>1],
              '2' => ['name'=>'For sale','value'=>2],
              '3' => ['name'=>'For lease','value'=>3],

            ]; ?>
            @Component('components.form-inputs.select',['title' => 'Assign to','name'=>'agent_id','icon'=>'fas fa-users','options'=>$Agents,'required'=>false])@endcomponent
            @Component('components.form-inputs.select',['title' => 'Property Type','name'=>'type','icon'=>'fas fa-home','options'=>$Types,'required'=>false,'selected'=>1])@endcomponent
            @Component('components.form-inputs.select',['title' => 'Liting Type','name'=>'listingType','icon'=>'fas fa-info-circle','options'=>$listingTypes,'required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Title','name'=>'title','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter title','required'=>true])@endcomponent

            @Component('components.form-inputs.input',['title' => 'Monthly rent','name'=>'monthlyRent','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter monthly rent','required'=>false, 'value'=>"0"])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Lease price','name'=>'leasePrice','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter lease price','required'=>false, 'value'=>"0"])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Sale price','name'=>'salePrice','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter sale price','required'=>false, 'value'=>"0"])@endcomponent

            @Component('components.form-inputs.input',['title' => 'Security deposit','name'=>'securityDeposit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter security deposit','required'=>false])@endcomponent

            @Component('components.form-inputs.input',['title' => 'Service charge','name'=>'serviceCharge','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter service charge','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Water deposit','name'=>'waterDeposit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter water deposit','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Electricity deposit','name'=>'electricityDeposit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter electricity deposit','required'=>false])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent

          </div>

          <div class="col-md-4">

            <?php $Live=[
              'inactive' => ['name'=>'listing inactive','value'=>''],
              'live' => ['name'=>'Listing live','value'=>1],
            ]; ?>

            @Component('components.form-inputs.select',['title' => 'status','name'=>'live','icon'=>'fas fa-globe','options'=>$Live,'required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'City','name'=>'city','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter city','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Landmark','name'=>'landmark','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter landmark','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Listed on','name'=>'startDate','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd-mm-yyyy','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Expires on','name'=>'endDate','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd-mm-yyyy','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Available date','name'=>'availableDate','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd-mm-yyyy','required'=>false])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Create agent'])@endcomponent

          </div>
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new user','question'=>'Are you sure you want to save client?','modalID'=>'newUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-user-form'])@endcomponent

@endsection
