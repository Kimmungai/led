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
        @Component('components.structure.page-title',['title'=>'Edit listing'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New listing','href'=>route('listing.create'),'toolTip'=>'Create a new sale','icon'=>'fas fa-home','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('listing.index'),'specifiedText'=>'All lisitngs','specified'=>'Listing-'.$listing->id])
        @endcomponent

        <div class="row">
          <form id="edit-user-form" action="{{route('listing.update',$listing->id)}}" method="post" onsubmit="confirm_modal('userEditConfirmModal')">
            @csrf
            @method('PUT')
          <div class="col-md-8">

            <?php $Types=[
              'commercial' => ['name'=>'Commercial','value'=>1],
              'residential' => ['name'=>'Residential','value'=>2],
              'agricultural' => ['name'=>'Agricultural','value'=>3],
              'industrial' => ['name'=>'Industrial','value'=>4],

            ]; ?>
            <?php $listingTypes=[
              'rent' => ['name'=>'For rent','value'=>1],
              'sale' => ['name'=>'For sale','value'=>2],
              'lease' => ['name'=>'For lease','value'=>3],

            ]; ?>
            @Component('components.form-inputs.select',['title' => 'Property Type','name'=>'type','icon'=>'fas fa-home','options'=>$Types,'required'=>false,'selected' => $listing->type])@endcomponent
            @Component('components.form-inputs.select',['title' => 'Liting Type','name'=>'listingType','icon'=>'fas fa-info-circle','options'=>$listingTypes,'required'=>false,'selected' => $listing->listingType])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Title','name'=>'title','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter title','required'=>true,'value' =>$listing->title])@endcomponent

            @if($listing->listingType == 1)
              @Component('components.form-inputs.input',['title' => 'Monthly rent','name'=>'monthlyRent','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter monthly rent','required'=>true,'value' =>$listing->monthlyRent])@endcomponent
            @elseif( $listing->listingType == 2 )
              @Component('components.form-inputs.input',['title' => 'Sale price','name'=>'salePrice','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter sale price','required'=>true,'value' =>$listing->salePrice])@endcomponent
            @elseif( $listing->listingType == 3 )
              @Component('components.form-inputs.input',['title' => 'Lease price','name'=>'leasePrice','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter lease price','required'=>true,'value' =>$listing->leasePrice])@endcomponent
            @endif

            @Component('components.form-inputs.input',['title' => 'Security deposit','name'=>'securityDeposit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter security deposit','required'=>false,'value' =>$listing->securityDeposit])@endcomponent

            @Component('components.form-inputs.input',['title' => 'Service charge','name'=>'serviceCharge','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter service charge','required'=>false,'value' =>$listing->serviceCharge])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Water deposit','name'=>'waterDeposit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter water deposit','required'=>false,'value' =>$listing->waterDeposit])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Electricity deposit','name'=>'electricityDeposit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter electricity deposit','required'=>false,'value' =>$listing->electricityDeposit])@endcomponent



            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block  pay-btn','toolTip'=>'Update user'])@endcomponent
            @Component('components.form-inputs.button',['value' => 'Delete','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete user','click'=>'confirm_modal("deleteListingConfirmModal")'])@endcomponent

          </div>

          <div class="col-md-4">

            <?php $Live=[
              'inactive' => ['name'=>'listing inactive','value'=>''],
              'live' => ['name'=>'Listing live','value'=>1],
            ]; ?>

            @Component('components.form-inputs.select',['title' => 'status','name'=>'live','icon'=>'fas fa-globe','options'=>$Live,'required'=>false,'selected' => $listing->live])@endcomponent
            @Component('components.form-inputs.input',['title' => 'City','name'=>'city','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter city','required'=>false,'value' =>$listing->city])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Landmark','name'=>'landmark','type'=>'text','icon'=>'fas fa-info-circle','placeholder' => 'Enter landmark','required'=>false,'value' =>$listing->landmark])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Listed on','name'=>'startDate','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd-mm-yyyy','required'=>false,'value' =>date('Y-m-d',strtotime($listing->startDate))])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Expires on','name'=>'endDate','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd-mm-yyyy','required'=>false,'value' =>date('Y-m-d',strtotime($listing->endDate))])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Available date','name'=>'availableDate','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd-mm-yyyy','required'=>false,'value' =>date('Y-m-d',strtotime($listing->availableDate))])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Update user'])@endcomponent

          </div>
        </form>
        <!--hidden forms-->

        <form class="d-none hidden" id="delete-listing-form" action="{{route('listing.destroy',$listing->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Update client','question'=>'Are you sure you want to update record?','modalID'=>'userEditConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-user-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete client','question'=>'Are you sure you want to delete record?','modalID'=>'deleteListingConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-listing-form'])@endcomponent

@endsection
