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
          <form id="new-user-form" action="{{route('payment.store')}}" method="post" onsubmit="confirm_modal('newUserConfirmModal')">
            @csrf

          <div class="col-md-8">

            @Component('components.form-inputs.input',['title' => 'Method','name'=>'method','type'=>'text','icon'=>'fas fa-tag','placeholder' => 'Enter method','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Due','name'=>'totalDue','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter due amount','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Receivable','name'=>'totalPayable','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter receivable amount','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Status','name'=>'status','type'=>'text','icon'=>'fas fa-circle','placeholder' => 'Enter status','required'=>true])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent

          </div>

          <div class="col-md-4">

            @Component('components.form-inputs.input',['title' => 'Discount','name'=>'discount','type'=>'number','icon'=>'fas fa-gift','placeholder' => 'Discount','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Coupon','name'=>'couponCode','type'=>'number','icon'=>'fas fa-gift','placeholder' => 'Coupon code','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Currency','name'=>'currency','type'=>'text','icon'=>'fas fa-money','placeholder' => 'Currency code','required'=>false])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Create agent'])@endcomponent

          </div>
        </form>
        <form id="user-avatar-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="user-avtar-file" onchange="upload_image(this.value,this.id,'user-avatar',{required:0,min:0,max:255,type:'image',size:1},'user-avatar-url','staff')">
        </form>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new user','question'=>'Are you sure you want to save client?','modalID'=>'newUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-user-form'])@endcomponent

@endsection
